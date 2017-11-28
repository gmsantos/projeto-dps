<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCausesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('causes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cause');
            $table->timestamps();
        });
        
        // volunteers, causes: cause_volunteer
        
        Schema::create('cause_volunteer', function (Blueprint $table) {
            $table->integer('cause_id')->unsigned();
            $table->foreign('cause_id')->references('id')->on('causes')->onDelete('cascade');
            
            $table->integer('volunteer_id')->unsigned();
            $table->foreign('volunteer_id')->references('id')->on('volunteers')->onDelete('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cause_volunteer');
        Schema::drop('causes');
    }
}
