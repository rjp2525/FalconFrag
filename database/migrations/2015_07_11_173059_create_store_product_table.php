<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreProductTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('store_products', function (Blueprint $table) {
            $table->string('id', 36)->primary();

            // General Options
            $table->boolean('hidden')->default(false);
            $table->boolean('domain_options')->default(false);
            $table->boolean('welcome_email')->default(false);
            $table->boolean('inventory_alerts')->default(false);
            $table->boolean('prorated_billing')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('store_products');
    }
}
