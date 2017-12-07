<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('event')->unsigned();
            $table->integer('participant')->unsigned();
            $table->text('content');

            $table->foreign('event')->references('id')->on('events');
            $table->foreign('participant')->references('id')->on('participants');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_posts');
    }
}
