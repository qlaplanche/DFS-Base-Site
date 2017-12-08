<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->boolean('is_sam')->default(false);
            $table->integer('nb_places')->nullable()->default(NULL)->unsigned();
            $table->boolean('need_sam')->default(true);
            $table->boolean('accepted')->default(false);
            $table->integer('event_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('is_arrived')->nullable()->default(NULL);
            $table->dateTime('home_departure_at')->nullable()->default(NULL);
            $table->dateTime('home_arrived_at')->nullable()->default(NULL);
            $table->enum('situation',['ok','warning','critical'])->default('ok');

            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
