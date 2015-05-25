<?php

use Falcon\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate an administrator account
        $user = new User;

        $user->first_name = 'John';
        $user->last_name = 'Doe';
        $user->company = 'Falcon Frag';
        $user->username = 'admin';
        $user->email = 'admin@falconfrag.com';
        $user->password = bcrypt('falcon1');
        $user->active = true;
        $user->save();
    }

}
