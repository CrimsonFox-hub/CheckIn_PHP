<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CheckIn', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('status')->references('id')->on('habitation');
            $table->string('Fio');
            $table->bigInteger('Medkarta');
            $table->bigInteger('gender');
            $table->bigInteger('birthday');
            $table->date('dogovor_date');
            $table->date('plan_end_date')->nullable()->default(null);
            $table->bigInteger('doctor');
            $table->bigInteger('margin')->nullable();
            $table->bigInteger('nds')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CheckIn');
    }
}
