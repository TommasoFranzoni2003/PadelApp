<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;

    // Attributi del campo da padel
    protected $fillable = [
        'name',             
        'description',      //descrizione del campo
        'location',         //posizione del campo
        'price_per_hour',   
        'status',           //es: attivo/manutenzione/...
        'complex_id',       //struttura a cui appartiene il campo
    ];

    //cast degli attributi
    protected $casts = [
        'price_per_hour' => 'float',
    ];

    // Riferimento alla struttura (Complex) a cui appartiene il campo
    public function complex()
    {
        return $this->belongsTo(Complex::class);
    }

    // Tutte le prenotazioni associate a questo campo
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    //tutte le disponibilità associate a questo campo
    public function availabilitySchedules()
    {
        return $this->hasMany(AvailabilitySchedule::class);
    }
}