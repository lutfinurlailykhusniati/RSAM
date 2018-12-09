<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('dusun');
            $table->string('rt');
            $table->string('rw');
            $table->string('no_rumah');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('goldar');
            $table->string('no_tlp');
            $table->string('no_ktp');
            $table->string('no_kk');
            $table->string('status_pernikahan');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('pendidikan');
            $table->string('bahasa');
            $table->rememberToken();
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
        Schema::dropIfExists('pasiens');
    }
}
