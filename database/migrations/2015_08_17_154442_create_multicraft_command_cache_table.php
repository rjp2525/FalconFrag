<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMulticraftCommandCacheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multicraft_command_cache', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('server_id', 36)->index();
            $table->integer('command')->index();
            $table->text('data');
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
        Schema::drop('multicraft_command_cache');
    }
}
