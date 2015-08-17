<?php

use Falcon\Models\Permission;
use Falcon\Models\Role;
use Falcon\Models\User;
use Illuminate\Database\Seeder;

class BaseUserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create an administrator account
        $user = User::create([
            'name'              => 'John Doe',
            'email'             => 'admin@falconfrag.com',
            'password'          => bcrypt('Falcon1'),
            'confirmation_code' => hash_hmac('sha256', str_random(40), config('app.key'))
        ]);

        // Create a role for administrators
        $admin = Role::create([
            'name'        => 'Administrator',
            'slug'        => 'staff.administrator',
            'description' => 'Access to all protected areas.',
            'level'       => 5
        ]);

        // Create a sample permission for the role
        $perm_user_list = Permission::create([
            'name'        => 'View Accounts',
            'slug'        => 'staff.user.list',
            'description' => 'View list of all user accounts.'
        ]);

        // Create a sample permission to edit users
        $perm_user_edit = Permission::create([
            'name'        => 'Edit Account',
            'slug'        => 'staff.user.edit',
            'description' => 'Modify a user account.'
        ]);

        // Create a sample permission for the user
        $perm_user_delete = Permission::create([
            'name'        => 'Delete Account',
            'slug'        => 'staff.user.delete',
            'description' => 'Delete a user account.'
        ]);

        // Attach relationships
        $admin->attachPermission($perm_user_list);
        $admin->attachPermission($perm_user_edit);
        $user->attachRole($admin);
        $user->attachPermission($perm_user_delete);

        /*
    // Create an administrator account
    $user = new User;
    $user->name = 'John Doe';
    $user->email = 'admin@falconfrag.com';
    $user->password = bcrypt('Falcon1');
    $user->save();

    // Create a role for administrators
    $admin = new Role;
    $admin->name = 'Administrator';
    $admin->node = 'staff.administrator';
    $admin->description = 'Access to all protected areas.';
    $admin->level = 5;
    $admin->save();

    // Create a sample permission for the role
    $perm_user_list = new Permission;
    $perm_user_list->name = 'View Accounts';
    $perm_user_list->node = 'staff.user.list';
    $perm_user_list->description = 'View list of all user accounts.';
    $perm_user_list->save();

    // Create a sample permission to edit users
    $perm_user_edit = new Permission::create([
    'Edit Account';
    'node' => 'staff.user.edit';
    'description' => 'Modify a user account.';
    ]);

    // Create a sample permission for the user
    $perm_user_delete = Permission::create([
    'Delete Account',
    'node' => 'staff.user.delete',
    'description' => 'Delete a user account.',
    ]);
     */
    }
}
