<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_listings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('session_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('active');
            $table->foreign('session_id')->references('id')->on('sessions');
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
        Schema::drop('course_listings');
    }
}
