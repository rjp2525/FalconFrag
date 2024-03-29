<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('filename');
            $table->string('original_name');
            $table->string('description')->nullable();
            $table->string('extension');
            $table->string('mime_type')->nullable();
            $table->integer('size')->nullable();
            $table->json('meta')->nullable();
            $table->string('imageable_id', 36);
            $table->string('imageable_type');
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
        Schema::drop('images');
    }
}
