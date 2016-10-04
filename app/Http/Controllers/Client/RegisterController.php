<?php

namespace Falcon\Http\Controllers\Client;

use Falcon\Http\Controllers\Controller;
use Falcon\Models\Account\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\RegistersUsers;
use Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
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
}
