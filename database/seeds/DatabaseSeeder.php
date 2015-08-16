<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('BaseUserRoleSeeder');
        $this->call('OAuthTableSeeder');
        $this->call('ProductCategoryTableSeeder');
        $this->call('ProductTableSeeder');
        $this->call('ReviewTableSeeder');
        $this->call('CountryTableSeeder');

        Model::reguard();
    }
}
