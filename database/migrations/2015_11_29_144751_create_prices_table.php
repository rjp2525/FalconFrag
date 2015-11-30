<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            //$table->string('product_id', 36);
            //$table->morphs('priceable');
            $table->string('priceable_id', 36);
            $table->string('priceable_type');
            $table->boolean('prorated_billing')->default(false);
            $table->integer('prorata_date')->default(1);
            $table->decimal('setup_monthly', 10, 2)->default(0.00);
            $table->decimal('setup_quarterly', 10, 2)->default(0.00);
            $table->decimal('setup_semiannual', 10, 2)->default(0.00);
            $table->decimal('setup_annual', 10, 2)->default(0.00);
            $table->decimal('setup_biennial', 10, 2)->default(0.00);
            $table->decimal('monthly', 10, 2)->default(0.00);
            $table->decimal('quarterly', 10, 2)->default(0.00);
            $table->decimal('semiannual', 10, 2)->default(0.00);
            $table->decimal('annual', 10, 2)->default(0.00);
            $table->decimal('biennial', 10, 2)->default(0.00);
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
        Schema::drop('prices');
    }
}
