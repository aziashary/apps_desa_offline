<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sk', function (Blueprint $table) {
            $table->bigIncrements('id_sk');
            $table->string('id_kodesk');
            $table->string('kode_sk');
            $table->string('jenis_sk');
            $table->string('no_sk')->unique();
            $table->string('id_warga');
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
        Schema::dropIfExists('sku');
    }
}
