<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukuBesarGajisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_besar_gajis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('laporan_id');
            $table->string('keterangan');
            $table->string('ref');
            $table->integer('debit');
            $table->integer('kredit');
            $table->integer('saldo');
            $table->timestamps();

            $table->foreign('laporan_id')->references('id')->on('laporans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku_besar_gajis');
    }
}
