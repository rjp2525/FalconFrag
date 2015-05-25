<?php namespace Falcon\Http\Controllers\Admin;

use Falcon\Http\Controllers\Controller;
use Falcon\Models\User;

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

    /**
     * Display a list of registered user accounts
     *
     * @return Response
     */
    public function userlist(User $user)
    {
        $users = $user->paginate(25);
        return view('admin.users', ['users' => $users]);
    }

}
