<?php

namespace Falcon\Http\Controllers\Api\V1\Auth;

//use Dingo\Api\Routing\ControllerTrait;
use Falcon\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    //use ControllerTrait;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sample = ['key1' => 'value1', 'key2' => 'value2'];
        return $sample;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                //return response()->json(['error' => 'invalid_credentials'], 401);
                //return $this->response->error('invalid_credentials', 401);
                return response()->make(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            //return response()->json(['error' => 'could_not_create_token'], 500);
            //return response()->json(['error' => $e->getMessage()], 500);
            //return ['error' => $e->getMessage()];
            return response()->make(['error' => 'could_not_create_token'], 500);
            //return $this->response->error('could_not_create_token', 500);
        }

        return compact('token');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
