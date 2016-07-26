<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->timestamp('created_at');
            $table->string('method', 4);
            $table->text('path');
            $table->string('ip', 45);
            $table->string('session');
            $table->text('get')->nullable();
            $table->text('post')->nullable();
            $table->text('cookies')->nullable();
            $table->string('agent');
            $table->integer('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('requests');
    }
}
