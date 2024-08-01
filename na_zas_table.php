<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('na_zaselenie', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('type-doc');
            $table->string('user');
            $table->bigInteger('patient_id')->references('id')->on('patients');
            $table->bigInteger('doc_id')->references('id')->on('doc_type');
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
        Schema::dropIfExists('patient_docs');
    }
}
