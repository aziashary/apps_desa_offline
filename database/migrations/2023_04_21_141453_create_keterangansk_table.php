<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeteranganskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterangansk', function (Blueprint $table) {
            $table->bigIncrements('id_keterangansk');
            $table->string('id_kodesk')->unique();
            $table->string('kode_sk')->nullable();
            $table->string('no_sk')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama_warga')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jenis_pekerjaan')->nullable();
            $table->string('agama')->nullable();
            $table->string('keterangan_1')->nullable();
            $table->string('keterangan_2')->nullable();
            $table->string('keterangan_3')->nullable();
            $table->string('keterangan_4')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('ttd_pengaju')->nullable();
            $table->string('ttd_kepala')->nullable();
            $table->string('tanggal')->nullable();

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
        Schema::dropIfExists('keterangansk');
    }
}
