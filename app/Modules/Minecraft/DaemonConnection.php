<?php

namespace Falcon\Modules\Minecraft;

class DaemonConnection
{
    public $id;
    public $name;
    public $ip;
    public $port;
    public $password;
    public $token;
    public $socket;
    public $socket_timeout;
    public $bridge;
    public $tried_connection = false;
    public $connection_error = '';

    public function __construct($bridge, $id, $name, $ip, $port, $password, $token)
    {
        $this->bridge = $bridge;
        $this->id = $id;
        $this->name = $name;
        $this->ip = $ip;
        $this->port = $port;
        $this->password = $password;
        $this->token = $token;
        $this->socket_timeout = $bridge->socket_timeout;
        $this->socket = false;
    }

    public function connect()
    {
        if ($this->tried_connection) {
            // Error while connecting
            return false;
        }

        $this->tried_connection = true;
        $this->connection_error = '';
        $error_num = 0;
        $error_str = '';

        $this->socket = @pfsockopen($this->ip, $this->port, $error_num, $error_str, $this->socket_timeout);
        if (!$this->socket) {
            $this->connection_error = 'Can\'t connect to Minecraft bridge! ({$error_num}: {$error_str})';
            $this->socket = false;
            return false;
        }
        stream_set_timeout($this->socket, $this->socket_timeout);

        while ($this->dataReady()) {
            if (!fgets($this->socket)) {
                break;
            }
        }

        if (!$this->connected()) {
            $this->connection_error = 'Can\'t connect to Minecraft bridge! (Connection lost)';
            $this->socket = false;
            return false;
        }

        return true;
    }

    /**
     * Check if there's an active socket connection
     *
     * @return bool
     */
    public function connected()
    {
        return $this->socket !== false;
    }

    public function command($command, &$data)
    {
        $command = str_replace("\n", " ", $command);
        if (!$this->send($command)) {
            return false;
        }

        $response = $this->receive();
        if (!$response['ack']) {
            return false;
        }

        $data = Minecraft::parse($response['data']);
        return true;
    }

    public function dataReady()
    {
        if (!$this->connected()) {
            return false;
        }

        return @stream_select($read = [$this->socket], $write = null, $except = null, 0) > 0;
    }

    public function send($data)
    {
        if (!$this->connected()) {
            if (!$this->bridge->autoconnect) {
                // Not connected
                return false;
            }

            if (!$this->connect() || !$this->auth()) {
                return false;
            }

        }

        if (@fwrite($this->socket, $data . "\n") === false) {
            // Send failed
            return false;
        }

        return true;
    }

    public function receive()
    {
        if (!$this->connected()) {
            // Not connected
            return false;
        }

        $ret = [];
        $ret['ack'] = false;
        $ret['error'] = 'Data receive timeout';
        $ret['data'] = [];

        $prev = '';
        while (true) {
            $r = fgets($this->socket);
            $data = $prev . $r;
            $prev = $data;

            if ($r && $data[strlen($data) - 1] != "\n") {
                continue;
            }

            if (strlen($data) && $data[0] == '>') {
                if ($data[1] != 'O') {
                    $ret['error'] = preg_replace('/ERROR( - )?/', '', substr($data, 1, strlen($data) - 2));
                } else {
                    $ret['ack'] = true;
                    $ret['error'] = false;
                }

                if ($this->dataReady()) {
                    // A second response is on the stream, discard current response
                    $ret['ack'] = false;
                    $ret['error'] = false;
                    $ret['data'] = [];
                    $prev = '';
                } else {
                    break;
                }
            } elseif (!$data) {
                if (!$ret['ack']) {
                    $ret['error'] = 'Empty response';
                }

                break;
            } else {
                $prev = '';
                $ret['data'][] = substr($data, 1, strlen($data) - 2);
            }
        }

        if (!$ret['ack']) {
            $this->connection_error = $ret['error'];
        }

        return $ret;
    }
}
