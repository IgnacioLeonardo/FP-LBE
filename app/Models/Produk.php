<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = ['nama', 'harga', 'jumlah_stock'];
    
    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class);
    }
}

