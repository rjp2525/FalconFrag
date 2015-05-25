<?php

use Bican\Roles\Models\Role;
use Falcon\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clients
        $client = Role::create([
            'name' => 'Client',
            'slug' => 'client',
            'description' => 'Default, all users belong to this role',
            'level' => 1,
        ]);

        // General Support Representative
        $support_gen = Role::create([
            'name' => 'Support Representative',
            'slug' => 'support',
            'description' => 'Provides general support to clients by answering questions and troubleshooting problems.',
            'level' => 2,
        ]);

        // Billing Specialist
        $billing_rep = Role::create([
            'name' => 'Billing Specialist',
            'slug' => 'billing',
            'description' => 'Processes changes in information system to support accurate and efficent billing process and financial close.',
            'level' => 3,
        ]);

        // Manager
        $manager = Role::create([
            'name' => 'Manager',
            'slug' => 'manager',
            'description' => 'Provides leadership and vision to the company by assisting with annual plans, and with evaluation of progress on existing plans.',
            'level' => 4,
        ]);

        // Administrator
        $administrator = Role::create([
            'name' => 'Administrator',
            'slug' => 'admin',
            'description' => 'Essentially CEO/CFO, responsible for meeting the needs of employees, customers, communities and the law.',
            'level' => 5,
        ]);

        // Attach administrator role to seeded user
        $user = User::find(1)->attachRole($administrator);
    }

}
