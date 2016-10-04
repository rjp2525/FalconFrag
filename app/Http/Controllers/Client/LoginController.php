<?php

namespace Falcon\Http\Controllers\Client;

use Falcon\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/client/overview';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return route('client.auth.login');
    }

    public function history()
    {
        //$accounts = User::all()->revisionHistory;
        //dd(Auth::user()->revisionHistory());
        return view('auth.history');
    }
}
