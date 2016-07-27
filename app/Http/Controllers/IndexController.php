<?php

namespace Falcon\Http\Controllers;

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
        return view('default.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('default.about');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function network()
    {
        return view('default.network');
    }

    /**
     * Display the static terms of service page.
     *
     * @return \Illuminate\Http\Response
     */
    public function tos()
    {
        return view('default.terms');
    }

    /**
     * Display the static privacy policy page.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacy()
    {
        return view('default.privacy');
    }
}
