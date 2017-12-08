<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sam_id')->unsigned();
	        $table->integer('participant_id')->unsigned();
	        $table->integer('event_id')->unsigned();
            $table->timestamps();

        });

        Schema::table('sams', function (Blueprint $table) {
            $table->foreign('sam_id')->references('id')->on('participants');
            $table->foreign('participant_id')->references('id')->on('participants');
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sams');
    }
}
