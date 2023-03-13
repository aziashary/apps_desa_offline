<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->bigIncrements('id_warga');
            $table->string('nik')->unique();
            $table->string('nama_warga');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('RT');
            $table->integer('RW');
            $table->string('desa');
            $table->string('alamat');
            $table->string('jenis_pekerjaan');
            $table->string('jenis_kelamin');
            $table->string('agama');
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
        Schema::dropIfExists('warga');
    }
}
