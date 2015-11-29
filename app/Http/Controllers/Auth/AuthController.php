<?php

namespace Falcon\Http\Controllers\Auth;

use Auth;
use Falcon\Http\Controllers\Controller;
use Falcon\Models\Account\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Validator;

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
            // Personal
            'first_name' => 'required|min:2|max:255|alpha',
            'last_name'  => 'required|min:2|max:255|alpha',
            'username'   => 'required|min:3|max:20|alpha_dash',
            'email'      => 'required|email|max:255|unique:users',
            'company'    => 'max:255',
            'phone'      => 'required|phone',
            'password'   => 'required|confirmed|min:8',

            // Address
            'address1' => 'required|min:4|max:255',
            'address2' => 'min:4|max:255',
            'city'     => 'required|min:3|max:255',
            'state'    => 'required',
            'country'  => 'required|max:2',
            'postcode' => 'required|min:2|max:20',

            // Miscellaneous
            'terms' => 'accepted'

            //'name' => 'required|max:255',
            //'email' => 'required|email|max:255|unique:users',
            //'password' => 'required|confirmed|min:6',
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

    public function getEdit()
    {
        return view('auth.edit');
    }

    public function postEdit(Request $request)
    {
        $data = $request->input();

        $validator = Validator::make($data, [
            'name'     => 'max:255',
            'email'    => 'email|max:255|unique:users',
            'password' => 'min:6'
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
}
