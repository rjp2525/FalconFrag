<?php namespace Falcon\Http\Controllers;

use Falcon\Http\Controllers\Controller;
use Falcon\Http\Requests\Auth\LoginRequest;
use Falcon\Http\Requests\Auth\RegisterRequest;
use Falcon\Models\User;
use Illuminate\Contracts\Auth\Guard;

class AuthController extends Controller
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest');
    }

    public function getLogin()
    {
        return view('account.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        // Process the login request
        $username = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');

        if ($this->auth->attempt(['email' => $username, 'password' => $password], $remember)) {
            if (!$this->auth->user()->active == true) {
                $error = 'Your account has not been activated yet. Please check your email for activation instructions.';
                $this->auth->logout();
                return redirect()->action('AuthController@getLogin')->with('error', $error);
            }

            return redirect()->intended('/');
        }

        $error = 'The credentials you entered were incorrect.';
        return redirect()->action('AuthController@getLogin')->with('error', $error);
    }

    public function getRegister()
    {
        return view('account.auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        // Process the registration request
        $user = new User;

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->company = empty($request->input('company')) ? null : $request->input('company');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->activation_code = sha1(microtime(true) . $request->input('email'));
        $user->save();

        $success = 'You have successfully been registered. Please check your email for instructions on how to activate your account.';
        return redirect()->action('AuthController@getLogin')->with('success', $success);
    }

    public function getActivate(User $user, $token)
    {
        $account = $user->where('activation_code', $token)->first();
        if ($account) {
            $account->activation_code = null;
            $account->active = true;
            $account->save();

            $success = 'Your account has been activated! You may now sign in.';
            return redirect()->action('AuthController@getLogin')->with('success', $success);
        }

        $error = 'The activation code you provided was invalid or expired.';
        return redirect()->action('AuthController@getLogin')->with('error', $error);
    }

}
