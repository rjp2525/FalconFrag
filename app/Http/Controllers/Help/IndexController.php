<?php

namespace Falcon\Http\Controllers\Help;

use Falcon\Http\Controllers\Controller;
use Falcon\Http\Requests;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('help.index');
    }
}
