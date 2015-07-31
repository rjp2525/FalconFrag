<?php

namespace Falcon\Http\Controllers\Auth;

use Falcon\Models\User;
use Validator;
use Falcon\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout', 'getEdit', 'postEdit', 'history']]);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
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
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getEdit()
    {
        return view('auth.edit');
    }

    public function postEdit(Request $request)
    {
        $data = $request->input();

        $validator = Validator::make($data, [
            'name' => 'max:255',
            'email' => 'email|max:255|unique:users',
            'password' => 'min:6',
        ]);

        if ($validator->passes()) {
            $user = User::find(Auth::id());
            if (!empty($data['name'])) {
                $user->name = $data['name'];
            }
            if (!empty($data['email'])) {
                $user->email = $data['email'];
            }
            if (!empty($data['password'])) {
                $user->password = bcrypt($data['password']);
            }

            $user->save();

            return redirect('/home');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function history()
    {
        //$accounts = User::all()->revisionHistory;
        //dd(Auth::user()->revisionHistory());
        return view('auth.history');
    }
}
