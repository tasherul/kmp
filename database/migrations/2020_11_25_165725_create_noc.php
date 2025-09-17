<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('noc')){
            return;
        }
        Schema::create('noc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_rank')->nullable();
            $table->string('issuing_authority')->nullable();
            $table->string('noc_file')->nullable();
            
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
        Schema::dropIfExists('contact_forms');
    }
}
