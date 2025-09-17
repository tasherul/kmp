<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('head_assistant_name')->nullable();
            $table->string('head_assistant_range_address')->nullable();
            $table->string('head_assistant_mobile_no')->nullable();
            $table->string('head_assistant_phone_no')->nullable();
            $table->string('head_assistant_email')->nullable();
            $table->string('control_room_office')->nullable();
            $table->string('control_room_mobile_no')->nullable();
            $table->string('control_room_phone_no')->nullable();
            $table->string('control_room_fax')->nullable();
            $table->string('control_room_email')->nullable();
            $table->string('control_room_kmp_address')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
