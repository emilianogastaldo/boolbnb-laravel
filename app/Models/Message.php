<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'flat_id',
        'first_name',
        'last_name',
        'email_sender',
        'text',
    ];
    // Relazione con l'appartamento
    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }

    // Metodo getter per la data
    public function getDate($format = 'd/m/y h:i:s')
    {
        return Carbon::create($this->created_at)->format($format);
    }
}
