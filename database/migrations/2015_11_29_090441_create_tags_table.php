<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('taggables', function (Blueprint $table) {
            $table->string('tag_id', 36);
            //$table->morphs('taggable');
            $table->string('taggable_id', 36);
            $table->string('taggable_type');
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
        Schema::drop('tags');
        Schema::drop('taggables');
    }
}
