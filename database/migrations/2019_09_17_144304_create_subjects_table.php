<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('title');
            $table->string('pre-requisite')->nullable();
            $table->string('lec_hrs')->nullable();
            $table->string('tut_hrs')->nullable();
            $table->string('pract_hrs')->nullable();
            $table->string('on_hrs')->nullable();
            $table->string('cred_hrs');
            $table->boolean('active')->nullable();
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
        Schema::drop('subjects');
    }
}
