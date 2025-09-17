<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('carrer_title')->nullable();
            $table->string('carrer_pdf_doc')->nullable();
            $table->string('comissoner_name')->nullable();
            $table->string('comissoner_designation')->nullable();
            $table->string('comissoner_from_date')->nullable();
            $table->string('comissoner_to_date')->nullable();
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
        Schema::dropIfExists('carrers');
    }
}
