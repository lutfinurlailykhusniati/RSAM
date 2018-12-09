<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_jadwal');
            $table->unsignedInteger('id_pasien');
            $table->string('no_antrian');
            $table->integer('is_done')->default('0');

            $table->foreign('id_pasien')->on('pasiens')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_jadwal')->on('jadwals')->references('id')->onUpdate('cascade')->onDelete('cascade');
          
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
        Schema::dropIfExists('bookings');
    }
}
