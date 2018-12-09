<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dokter_id');
            $table->date('tanggal_jadwal');
            $table->time('jam_mulai');
            $table->time('jam_berakhir');
            $table->integer('kuota');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('dokter_id')->on('doctors')->references('id')->onUpdate('cascade')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
}
