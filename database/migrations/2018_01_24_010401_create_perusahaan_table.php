<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kip');
            $table->string('nama_perusahaan');
            $table->string('alamat');
            $table->string('produk_utama');
            $table->string('tenaga_kerja');
            $table->string('contact_person');
            $table->string('telepon');
            $table->string('nama_petugas');
            $table->integer('id_kegiatan')->unsigned()->nullable();
            $table->foreign('id_kegiatan')->references('id')->on('kegiatan');
            $table->integer('id_dokumenmsk')->unsigned()->nullable();
            $table->foreign('id_dokumenmsk')->references('id_msk')->on('dokumenmsk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perusahaan');
    }
}
