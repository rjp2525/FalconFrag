<?php

namespace Falcon\Http\Controllers\Client;

use Falcon\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display the client's list of services
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'Service INDEX';
    }

    /**
     * Get more details for the requested service ID
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        return 'Service DETAIL';
    }
}
