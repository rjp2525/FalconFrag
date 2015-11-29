<?php

namespace Falcon\Modules\Minecraft;

class Minecraft
{
    public $autoconnect;
    public $socket_timeout;

    private $connections = [];
    private static $instance = null;
    private $daemon_ids = false;
    private $passwords = [];

    public function __construct($autoconnect = true)
    {
        $this->socket_timeout = 120;
        $this->autoconnect = $autoconnect;
    }

    public function getConnection($id)
    {
        //
    }
}
