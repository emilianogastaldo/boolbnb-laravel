<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    // Relazione con l'appartamento
    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }
}
