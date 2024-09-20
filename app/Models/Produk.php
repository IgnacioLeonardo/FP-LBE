<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'nama',
        'harga',
        'jumlah_stock',
    ];

    /**
     * A product can be in many carts.
     */
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_produk')
                    ->withPivot('quantity') // Access the quantity from the pivot table
                    ->withTimestamps();
    }
}
