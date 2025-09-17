<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrimeManagement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crime_managements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('range')->nullable();
            $table->string('speedy_trail')->nullable();
            $table->string('dacoity')->nullable();
            $table->string('robbery')->nullable();
            $table->string('murder')->nullable();
            $table->string('police_assault')->nullable();
            $table->string('burglary')->nullable();
            $table->string('theft')->nullable();
            $table->string('others_cases')->nullable();
            $table->string('total_cases')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('riot')->nullable();
            $table->string('women_repression')->nullable();
            $table->string('child_repression')->nullable();
            $table->string('kidnapping')->nullable();
            $table->string('arms_act')->nullable();
            $table->string('explosive')->nullable();
            $table->string('narcotics')->nullable();
            $table->string('smuggling')->nullable();
            $table->string('total')->nullable();
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
        Schema::dropIfExists('crime_managements');
    }
}
