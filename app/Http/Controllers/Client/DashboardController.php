<?php

namespace Falcon\Http\Controllers\Client;

use Falcon\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display the dashboard/overview for the client.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'Dashboard INDEX';
    }
}
