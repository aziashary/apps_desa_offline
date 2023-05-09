<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKodeskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kodesk', function (Blueprint $table) {
            $table->bigIncrements('id_kodesk');
            $table->string('kode_sk')->unique();
            $table->string('jenis_sk');
            $table->string('singkatan_sk');
            $table->string('keterangan_1');
            $table->string('keterangan_2')->nullable();
            $table->string('keterangan_3')->nullable();
            $table->string('keterangan_4')->nullable();
            $table->string('file_name')->nullable();
            $table->string('url_print')->nullable();
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
        Schema::dropIfExists('kodesk');
    }
}
