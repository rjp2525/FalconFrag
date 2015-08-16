<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('title');
            $table->text('body');
            $table->integer('rating');
            $table->string('reviewable_id', 36);
            $table->string('reviewable_type');
            $table->string('author_id', 36);
            $table->string('author_type');
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
        Schema::drop('reviews');
    }
}
