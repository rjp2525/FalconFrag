<?php namespace Falcon\Http\Controllers;

use Falcon\Http\Requests;
use Falcon\Http\Controllers\Controller;
use Falcon\Http\Requests\Auth\RegistrationRequest;

use Illuminate\Http\Request;

class AuthController extends Controller {

	public function getRegister() {
        return view('account.auth.register');
    }

    public function postRegister(RegistrationRequest $request) {
        return 'You made it!';
    }

}
