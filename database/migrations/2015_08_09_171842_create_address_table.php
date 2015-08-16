<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('addressable_id', 36);
            $table->string('addressable_type');
            $table->string('country_id', 36);
            $table->string('organization')->nullable();
            $table->string('name_prefix');
            $table->string('name_suffix')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('street_one');
            $table->string('street_two');
            $table->string('city');
            $table->string('city_prefix')->nullable();
            $table->string('city_suffix')->nullable();
            $table->string('state');
            $table->string('state_code')->nullable();
            $table->string('postcode');
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('addresses');
    }
}
