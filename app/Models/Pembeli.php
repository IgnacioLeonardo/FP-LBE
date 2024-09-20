<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;

    protected $table = 'pembeli'; // specify the table name

    
    public function user()
    {

        return $this->belongsTo(User::class);
    }
}

