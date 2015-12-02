<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_options', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('product_id', 36);
            $table->string('field_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->enum('type', ['checkbox', 'email', 'password', 'radio', 'text', 'url', 'dropdown'])->default('text');
            $table->json('options')->nullable();
            $table->string('default_value')->nullable();
            $table->json('validation')->nullable();
            $table->boolean('hidden')->default(false);
            $table->boolean('required')->default(false);
            $table->integer('display_order')->default(0);
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
        Schema::drop('product_options');
    }
}
