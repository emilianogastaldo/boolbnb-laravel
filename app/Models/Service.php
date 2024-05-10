<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    // Relazione con gli appartamenti
    public function flats()
    {
        return $this->belongsToMany(Flat::class);
    }
}
