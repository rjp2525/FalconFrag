<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('name');
            $table->string('a2', 2);
            $table->string('a3', 3)->nullable();
            $table->string('currency')->nullable();
            $table->string('calling_code')->nullable();
            $table->string('capital')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->timestamps();
            /*$table->text('altSpellings');
        $table->string('region')->nullable();
        $table->string('subregion')->nullable();
        $table->text('languages');
        $table->text('translations');
        $table->string('latlng');
        $table->string('demonym');
        $table->boolean('landlocked');
        $table->text('borders')->nullable();
        $table->integer('area');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('countries');
    }
}
