<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRanksAcknowledge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranks_acknowledges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rank_content')->nullable();
            $table->string('ranks_system_image')->nullable();
            $table->string('acknowledgement_content')->nullable();
            $table->string('acknowledgement_name')->nullable();
            $table->string('acknowledgement_designation')->nullable();
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
        Schema::dropIfExists('ranks_acknowledges');
    }
}
