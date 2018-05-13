<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('operator_id')->unsigned();
            $table->integer('aircraft_id')->unsigned();
            $table->integer('rate')->unsigned();
            $table->date('start_date');
            $table->date('close_date');

            $table->timestamps();
            $table->foreign('operator_id')->references('id')->on('operators')->onDelete('restrict');
            $table->foreign('aircraft_id')->references('id')->on('aircrafts')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
