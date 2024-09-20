<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pembeli extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'nomor_telepon',
        'password',
    ];

    /**
     * A pembeli can have many carts.
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
