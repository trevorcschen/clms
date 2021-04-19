<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseListingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_listing_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_listing_id')->unsigned();
            $table->integer('programme_id')->unsigned();
            $table->string('remark')->nullable();
            $table->string('amendment_reason')->nullable();
            $table->string('lecturer');
            $table->string('similar_sub')->nullable();
            $table->string('lec_hrs')->nullable();
            $table->string('tut_hrs')->nullable();
            $table->string('pract_hrs')->nullable();
            $table->string('on_hrs')->nullable();
            $table->integer('number_students');
            $table->integer('semester');
            $table->string('intake');
            $table->foreign('course_listing_id')->references('id')->on('course_listings');
            $table->foreign('programme_id')->references('id')->on('programmes');
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
        Schema::dropIfExists('course_listing_details');
    }
}
