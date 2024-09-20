<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'pembeli_id',
    ];

    /**
     * A cart can contain many products.
     */
    public function produks()
    {
        return $this->belongsToMany(Produk::class, 'cart_produk')
                    ->withPivot('quantity') // Access the quantity from the pivot table
                    ->withTimestamps();
    }

    /**
     * A cart belongs to a pembeli.
     */
    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class);
    }
}
