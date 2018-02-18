<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->increments('id');
          //  $table->increments('id_kegiatan')->unique();
            $table->string('nama_kegiatan');
            $table->string('tahun');
            $table->string('provinsi');
            $table->string('kabkota');
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
        Schema::dropIfExists('kegiatan');
    }
}
