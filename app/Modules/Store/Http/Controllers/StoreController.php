<?php namespace Falcon\Modules\Store\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class StoreController extends Controller {
	
	public function index()
	{
		return view('store::index');
	}
	
}