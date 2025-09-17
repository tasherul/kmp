<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomepage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emergency_tittle')->nullable();
            $table->string('logo_upload')->nullable();
            $table->string('logo_background_image')->nullable();
            $table->string('kmp_history')->nullable();
            $table->string('kmp_mission')->nullable();
            $table->string('kmp_vision')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('comissoner_name')->nullable();
            $table->string('comissoner_image')->nullable();
            $table->string('biography_of_comissoner')->nullable();
            $table->string('message_from_comissoner')->nullable();
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
        Schema::dropIfExists('homepages');
    }
}
