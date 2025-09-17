<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettings extends Migration
{
    /**
     * Run the migrations.
     *Carrer Tittle
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ornogram_image')->nullable();
            $table->string('APA_tittle')->nullable();
            $table->string('APA_pdf_doc')->nullable();
            $table->string('citizen_charter_image')->nullable();
            $table->string('document_tittle')->nullable();
            $table->string('document_pdf_doc')->nullable();
            
            $table->string('carrer_tittle')->nullable();
            $table->string('caarer_pdf_doc')->nullable();
            $table->string('document_tittle_2')->nullable();
            $table->string('documentr_pdf_doc_2')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
