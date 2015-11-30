<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_categories', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('parent_id', 36)->nullable();
            $table->string('slug');
            $table->string('title');
            $table->string('description')->nullable();
            $table->boolean('hidden')->default(false);
            $table->integer('display_order')->default(0);
            $table->string('image_bg')->nullable();
            $table->string('image_icon')->nullable();
            $table->string('image_main')->nullable();
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
        Schema::drop('categories');
    }
}
