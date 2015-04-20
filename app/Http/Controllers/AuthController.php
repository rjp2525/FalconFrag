<?php namespace Falcon\Http\Controllers;

use Falcon\Http\Requests;
use Falcon\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AuthController extends Controller {

	public function getRegister() {
        return view('account.auth.register');
    }

    public function postRegister() {
        //
    }

}
