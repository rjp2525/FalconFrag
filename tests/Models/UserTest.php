<?php

class UserTest extends TestCase
{

    public function testBelongsToRoles()
    {
        $this->assertBelongsToMany('Falcon\Models\Vault\Role', 'users');
    }

    public function testBelongsToPermissions()
    {
        $this->assertBelongsToMany('Falcon\Models\Vault\Permission', 'users');
    }

}
