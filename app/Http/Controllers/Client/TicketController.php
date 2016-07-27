<?php

namespace Falcon\Http\Controllers\Client;

use Falcon\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * Display a list of tickets that the client can access.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'Ticket INDEX';
    }

    /**
     * Display the full requested ticket thread.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        return 'Ticket DETAIL: ' . e($id);
    }
}
