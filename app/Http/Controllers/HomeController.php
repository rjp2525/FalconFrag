<?php

namespace Falcon\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Display the about us page.
     *
     * @return Response
     */
    public function about()
    {
        return view('default.about');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('default.index');
    }

}
