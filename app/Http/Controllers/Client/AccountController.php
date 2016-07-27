<?php

namespace Falcon\Http\Controllers\Client;

use Falcon\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Display the general settings page for a client's account.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings()
    {
        return 'Account Settings';
    }

    /**
     * Display the settings page for the user's profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return 'Account Profile Settings';
    }

    /**
     * Display all account activity to the logged in user.
     *
     * @return \Illuminate\Http\Response
     */
    public function security()
    {
        return 'Account Security';
    }
}
