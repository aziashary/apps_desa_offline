<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->bigIncrements('id_pengajuan');
            $table->string('kode_sk');
            $table->string('jenis_pengajuan');
            $table->string('no_pengajuan')->unique();
            $table->string('id_warga');
            $table->string('status_pengajuan');
            $table->string('keterangan_1');
            $table->string('keterangan_2')->nullable();
            $table->string('keterangan_3')->nullable();
            $table->string('keterangan_4')->nullable();
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
        Schema::dropIfExists('pengajuans');
    }
}
