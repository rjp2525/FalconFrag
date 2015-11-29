<?php

namespace Falcon\Modules\Servers\Multicraft;

use Falcon\Models\Servers\Multicraft\CommandCache;
use Falcon\Modules\Servers\Server;

class Multicraft extends Server
{
    /**
     * The API key for the Multicraft user
     *
     * @var string
     */
    private $key;

    /**
     * URL pointing to the Multicraft server
     *
     * @var string
     */
    private $url;

    private $user;
    private $lastResponse = '';
    protected $options = [];
    private $methods = [];

    public function __construct($url, $user = null, $key = null)
    {
        $this->setCredentials($url, $user, $key);
    }

    public function create($params)
    {
        return response()->json($params);
    }

    public function sendServerCommand($server, $command, &$data = null, $broadcast = false, $nocache = false)
    {
        $res_data = [];
        if ($res_data = CommandCache::whereServerId($server)->whereCommand($command)->firstOrFail()) {
            $data = $res_data->data;
            return true;
        }

        $command = 'server ' . $server . ':' . $command;
    }
}
