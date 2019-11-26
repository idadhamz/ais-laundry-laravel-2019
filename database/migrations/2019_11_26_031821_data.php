<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Data extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akun', function (Blueprint $table) {
            $table->integer('no_akun')->primary();
            $table->string('nm_akun', 100);
            $table->integer('saldo_normal')->nullable();
            $table->string('gol_akun', 10);
            $table->timestamps();
        });

        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('id_transaksi', 5)->primary();
            $table->string('nm_transaksi', 100);
            $table->date('tgl_transaksi');
            $table->integer('nominal_transaksi');
            $table->text('deskripsi')->nullable();
            $table->integer('id_user');
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
        Schema::dropIfExists('akun');
        Schema::dropIfExists('transaksi');
    }
}