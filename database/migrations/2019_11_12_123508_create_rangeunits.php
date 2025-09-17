<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRangeunits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rangeunits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('range')->nullable();
            $table->string('history')->nullable();
            $table->string('range_image')->nullable();

            $table->string('staff_range')->nullable();
            $table->string('staff_name')->nullable();
            $table->string('staff_designation')->nullable();
            $table->string('staff_contact')->nullable();
            $table->string('range_unit_staff_image')->nullable();
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
        Schema::dropIfExists('rangeunits');
    }
}
