<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->string('street');
            $table->string('street_extra')->nullable();
            $table->string('city');
            $table->string('state_a2', 2);
            $table->string('state_name');
            $table->string('zip');
            $table->string('country_a2', 2)->default('US');
            $table->string('country_name')->default('United States');
            $table->string('phone')->nullable();
            $table->boolean('primary')->default(true);
            $table->boolean('billing')->default(true);
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_addresses');
    }

}
