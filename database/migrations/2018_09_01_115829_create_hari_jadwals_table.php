<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHariJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hari_jadwals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_jadwal');
            $table->string('hari');
            $table->timestamps();

            $table->foreign('id_jadwal')->on('jadwals')->references('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hari_jadwals');
    }
}
