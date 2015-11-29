<?php

namespace Falcon\Http\Controllers\Client;

use Auth;
use Falcon\Http\Controllers\Controller;
use Falcon\Models\Account\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Validator;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout', 'history']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    }

    /**
     * Show the application register form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return view('client.auth.register');
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

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('client.login');
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route('client.overview');
    }

    /**
     * Display the confirmation page if there is no token provided
     * in the request, otherwise process/validate the confirmation
     *
     * @param  string|null $token
     * @return mixed
     */
    public function getConfirm($token = null, User $user)
    {
        if ($token) {
            try {
                $account = $user->getByConfirmation($token);
                $account->confirm();
                return response()->json($account);
                //return response()->json($token);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => true, 'message' => 'The confirmation code entered was invalid or has expired.'], 404);
            }
        }

        return 'Confirm your account';
    }

    public function history()
    {
        //$accounts = User::all()->revisionHistory;
        //dd(Auth::user()->revisionHistory());
        return view('auth.history');
    }
}
