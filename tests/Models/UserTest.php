<?php

class UserTest extends TestCase
{

    public function testBelongsToRoles()
    {
        $this->assertBelongsToMany('Falcon\Models\Role', 'users');
    }

    public function testBelongsToPermissions()
    {
        $this->assertBelongsToMany('Falcon\Models\Permission', 'users');
    }

}
