<?php

namespace Falcon\Http\Controllers\Client;

use Falcon\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    /**
     * Display a list of invoices that the client has.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'Invoice INDEX';
    }

    /**
     * Display the requested invoice.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        return 'Invoice DETAIL: ' . e($id);
    }
}
