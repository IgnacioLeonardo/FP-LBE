<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembelian extends Model
{
    use HasFactory;

    protected $table = 'transaksi_pembelian';

    // Define relationship with User (who made the purchase)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define relationship with Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // Define many-to-many relationship with Produk
    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'produk_transaksi_pembelian')
                    ->withPivot('jumlah');
    }
}

