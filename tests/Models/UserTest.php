<?php

use Falcon\Models\User;

class UserTest extends TestCase
{

    public function testRegistration()
    {
        // Create a new user
        $user = new User;
        $user->first_name = 'Example';
        $user->last_name = 'Account';
        $user->username = 'example';
        $user->email = 'test@example.com';
        $user->password = 'password';

        // User should be saved
        $this->assertTrue($user->save());
    }

}
