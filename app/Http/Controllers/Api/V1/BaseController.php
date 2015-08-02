<?php

namespace Falcon\Http\Controllers\Api\V1;

use Falcon\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * Returns the API index
     *
     * @return Response
     */
    public function index()
    {
        return response()->json(['error' => 'Invalid API Request']);
    }
}
