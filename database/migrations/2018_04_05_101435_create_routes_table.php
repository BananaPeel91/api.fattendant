<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('departure_date');
            $table->time('departure_time');
            $table->integer('departure_airport_id')->unsigned();
            $table->integer('arrival_airport_id')->unsigned();
            $table->timestamps();

            $table->foreign('departure_airport_id')->references('id')->on('airports')->onDelete('restrict');
            $table->foreign('arrival_airport_id')->references('id')->on('airports')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
