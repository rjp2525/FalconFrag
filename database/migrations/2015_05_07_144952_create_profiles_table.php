<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->integer('user_id')->unique();
            // 7505d64a54e061b7acd54ccd58b49dc43500b635 is the SHA1 hash of "default"
            $table->string('avatar')->default('https://falconfrag.com/content/avatars/7505d64a54e061b7acd54ccd58b49dc43500b635.png');
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
        Schema::drop('user_profiles');
    }

}
