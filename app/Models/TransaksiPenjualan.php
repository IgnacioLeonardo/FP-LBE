<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    use HasFactory;

    protected $table = 'transaksi_penjualan';

    // Define relationship with User (who processed the sale)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define relationship with Pembeli (the customer)
    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class);
    }

    // Define many-to-many relationship with Produk
    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'produk_transaksi_penjualan')
                    ->withPivot('jumlah');
    }
}

