<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('category_id', 36);
            $table->string('slug');
            $table->string('title');
            $table->string('description_short');
            $table->text('description_long');
            $table->text('config_options');
            $table->boolean('hidden')->default(false);
            $table->text('upgrades')->nullable();
            $table->text('downgrades')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
