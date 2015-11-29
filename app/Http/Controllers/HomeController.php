<?php

namespace Falcon\Http\Controllers;

use Falcon\Modules\Servers\Multicraft\Multicraft;

//use Auth;
//
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

    public function test(Multicraft $multicraft)
    {
        return $multicraft->create('test');
    }
}
