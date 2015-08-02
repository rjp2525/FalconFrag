<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreProductReviewTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('store_product_reviews', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('store_product_reviews');
    }
}
