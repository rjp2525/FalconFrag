<?php

use Falcon\Models\User;
use Falcon\Models\Vault\Permission;
use Falcon\Models\Vault\Role;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VaultTest extends TestCase
{
    use DatabaseTransactions;

    protected $userMock;

    public function testUserCapacity()
    {
        $perm_list_a = array();
        $perm_list_s = array();
        $perm_list_c = array();

        $admin_role = factory(Role::class, 'admin')->create();
        $staff_role = factory(Role::class, 'staff')->create();
        $client_role = factory(Role::class)->create();

        $admin_permissions = factory(Permission::class, 3)
            ->create()
            ->each(function ($p) use ($admin_role, &$perm_list_a) {
                $admin_role->attachPermission($p);
                array_push($perm_list_a, $p->node);
            });

        $staff_permissions = factory(Permission::class, 3)
            ->create()
            ->each(function ($p) use ($staff_role, &$perm_list_s) {
                $staff_role->attachPermission($p);
                array_push($perm_list_s, [$p->node]);
            });

        $client_permissions = factory(Permission::class, 3)
            ->create()
            ->each(function ($p) use ($client_role, &$perm_list_c) {
                $client_role->attachPermission($p);
                array_push($perm_list_c, $p->node);
            });

        $admin = factory(User::class)->create();
        $staff = factory(User::class)->create();
        $client = factory(User::class)->create();

        $admin->attachRole($admin_role);
        $staff->attachRole($staff_role);
        $client->attachRole($client_role);

        $this->userMock = Mockery::mock(Falcon\Models\User::class);

        $this->userMock
             ->shouldReceive('is')
             ->with('node', 'admin')
             ->andReturn(true);

        $this->app->instance(Falcon\Models\User::class, $this->userMock);
    }
}
