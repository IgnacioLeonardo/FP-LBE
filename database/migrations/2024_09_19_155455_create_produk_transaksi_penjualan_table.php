<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTransaksiPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_transaksi_penjualan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_penjualan_id');
            $table->unsignedBigInteger('produk_id');
            $table->integer('jumlah'); // Quantity of the product in the transaction
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('transaksi_penjualan_id')->references('id')->on('transaksi_penjualan')->onDelete('cascade');
            $table->foreign('produk_id')->references('id')->on('produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk_transaksi_penjualan');
    }
}

