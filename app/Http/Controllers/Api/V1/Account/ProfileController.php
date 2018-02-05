<?php

namespace Falcon\Http\Controllers\Api\V1\Account;

use Falcon\Http\Controllers\Controller;
use Falcon\Models\Account\User;

class ProfileController extends Controller
{
    /**
     * Return an account profile with basic information
     *
     * @return Response
     */
    public function getProfile()
    {
        // Return a basic message since we removed LucaDegasperi\OAuth2Server
        //return response()->json(User::find(Authorizer::getResourceOwnerId()));
        return response()->json(['message' => 'Pending OAuth2 refactor, please check back again soon.']);
    }
}
