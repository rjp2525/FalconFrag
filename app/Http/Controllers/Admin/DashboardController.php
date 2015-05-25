<?php namespace Falcon\Http\Controllers\Admin;

use Falcon\Http\Controllers\Controller;

class DashboardController extends Controller
{

    /**
     * Create a new instance of the controller
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('staff');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

}
