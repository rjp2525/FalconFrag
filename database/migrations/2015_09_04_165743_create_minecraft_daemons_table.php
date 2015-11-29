<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMinecraftDaemonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_minecraft_daemons', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('name');
            $table->string('ip');
            $table->integer('port')->default(25465);
            $table->string('token');
            $table->integer('memory')->default(0);
            $table->string('ftp_ip')->default('');
            $table->integer('ftp_port')->default(21);
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
        Schema::drop('server_minecraft_daemons');
    }
}
