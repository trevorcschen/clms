<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammeSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programme_subject', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('programme_id')->unsigned()->nullable();
            $table->integer('subject_id')->unsigned()->nullable();
            $table->foreign('programme_id')->references('id')->on('programmes');
            $table->foreign('subject_id')->references('id')->on('subjects');
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
        Schema::drop('programme_subject');
    }
}
