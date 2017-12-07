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
            $table->integer('sam')->unsigned();
	        $table->integer('participant')->unsigned();
	        $table->integer('event')->unsigned();
            $table->timestamps();

        });

        Schema::table('sams', function (Blueprint $table) {
            $table->foreign('sam')->references('id')->on('participants');
            $table->foreign('participant')->references('id')->on('participants');
            $table->foreign('event')->references('id')->on('events');
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
