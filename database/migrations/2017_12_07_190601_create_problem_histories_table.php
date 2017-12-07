<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
	    $table->double('latitude', 3, 7)->nullable();
	    $table->double('longitude', 3, 7)->nullable();
	    $table->date('occured_at');
	    $table->enum('situation', ['ok', 'warning', 'critical', 'meteo']);
	    $table->longText('description')->nullable();
	    $table->integer('event_id')->unsigned();
	    $table->integer('participant_id')->unsigned();

            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('participant_id')->references('id')->on('participants');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problem_histories');
    }
}
