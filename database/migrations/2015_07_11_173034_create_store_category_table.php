<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreCategoryTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('store_categories', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('slug');
            $table->string('image')->nullable();
            $table->string('name');
            $table->text('description');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keyword');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
