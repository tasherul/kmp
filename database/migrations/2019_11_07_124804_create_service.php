<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('conceptual_frame_work')->nullable();
            $table->string('community_policing_consists')->nullable();
            $table->string('bangladesh_perspective')->nullable();
            $table->string('community_policing')->nullable();

            $table->string('more_service')->nullable();
            $table->string('service_content')->nullable();

            $table->string('police_activities_abstarct')->nullable();
            $table->string('crime_management')->nullable();
            $table->string('internal_security')->nullable();
            $table->string('social_integration')->nullable();
            $table->string('performing_internationally')->nullable();

            $table->string('information_act')->nullable();
            $table->string('select_point')->nullable();
            $table->string('name')->nullable();
            $table->string('bp_no')->nullable();
            $table->string('designation')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('range_address')->nullable();

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
        Schema::dropIfExists('services');
    }
}
