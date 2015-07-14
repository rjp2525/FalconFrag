<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisionTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('revisions', function (Blueprint $table) {
            //$table->string('id', 36)->primary();
            $table->increments('id');
            $table->string('revisionable_type');
            $table->string('revisionable_id', 36);
            $table->string('user_id', 36)->nullable();
            $table->string('key');
            $table->text('old_value')->nullable();
            $table->text('new_value')->nullable();
            $table->string('ip_address');
            $table->string('user_agent');
            $table->timestamps();
            $table->index(array('revisionable_id', 'revisionable_type'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('revisions');
    }
}
