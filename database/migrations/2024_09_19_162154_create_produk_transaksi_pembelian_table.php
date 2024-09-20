<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_transaksi_pembelian', function (Blueprint $table) {
            $table->id(); // Primary key for the table
            $table->unsignedBigInteger('produk_id'); // Foreign key to 'produk' table
            $table->unsignedBigInteger('transaksi_pembelian_id'); // Foreign key to 'transaksi_pembelian' table
            $table->integer('jumlah'); // Quantity of the product in the transaction
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns

            // Foreign key constraints
            $table->foreign('produk_id')->references('id')->on('produk')->onDelete('cascade');
            $table->foreign('transaksi_pembelian_id')->references('id')->on('transaksi_pembelian')->onDelete('cascade');

            // Define the unique index with a custom name to avoid length issues
            $table->unique(['produk_id', 'transaksi_pembelian_id'], 'prod_trans_pembelian_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk_transaksi_pembelian');
    }
};
