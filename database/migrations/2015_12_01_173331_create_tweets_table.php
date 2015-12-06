<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('tweet_id');
            $table->string('reply_to_tweet_id')->nullable();
            $table->json('data');
            $table->boolean('mention')->default(false);
            $table->boolean('reply')->default(false);
            $table->boolean('normal')->default(false);
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
        Schema::drop('tweets');
    }
}
