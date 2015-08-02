<?php

namespace Falcon\Http\Controllers\Api\V1\Account;

use Falcon\Http\Controllers\Controller;
use Falcon\Models\User;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ProfileController extends Controller
{
    /**
     * Return an account profile with basic information
     *
     * @return Response
     */
    public function getProfile()
    {
        return response()->json(User::find(Authorizer::getResourceOwnerId()));
    }
}
