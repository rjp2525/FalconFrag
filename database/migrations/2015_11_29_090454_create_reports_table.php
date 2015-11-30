<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            //$table->morphs('reportable');
            $table->string('reportable_id', 36);
            $table->string('reportable_type');
            //$table->morphs('reporter');
            $table->string('reporter_id', 36);
            $table->string('reporter_type');
            $table->text('reason');
            $table->json('meta')->nullable();
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
        Schema::drop('reports');
    }
}
