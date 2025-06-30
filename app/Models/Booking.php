<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    //attributi della prenotazione
    protected $fillable = [
        'user_id', //id del customer che ha fatto la prenotazione
        'court_id', //id del campo prenotato
        'start_time',
        'end_time',
        'status',
        'price_total',
    ];

    //cast degli attributi
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    //riferimento all'utente che ha fatto la prenotazione
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //riferimento al campo che ha fatto la prenotazione
    public function court()
    {
        return $this->belongsTo(Court::class);
    }
}
