<?php

namespace Falcon\Http\Controllers\Api\V1;

use Auth;
use Authorizer;
use Falcon\Http\Controllers\Controller;

class OAuthController extends Controller
{
    /**
     * Authenticate a user by email and password in exchange
     * for an OAuth2 access_token and refresh_token
     *
     * @param  string $username The account email
     * @param  string $password The account password
     * @return mixed
     */
    public function authenticate($username, $password)
    {
        $credentials = [
            'email' => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::id();
        }

        return false;
    }

    /**
     * Issue an access token after successfully being
     * logged in to the user account
     *
     * @return Response
     */
    public function issueToken()
    {
        return response()->json(Authorizer::issueAccessToken());
    }
}
