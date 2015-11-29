<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportConlusionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_conclusions', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('report_id')->index();
            $table->morphs('judge');
            $table->text('conclusion');
            $table->text('action_taken');
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
        Schema::drop('report_conclusions');
    }
}
