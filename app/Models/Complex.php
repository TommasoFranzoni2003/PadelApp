<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complex extends Model
{
    use HasFactory;

    //attributi del complesso sportivo
    protected $fillable = [
        'name',         
        'description',  //descrizione generale del complesso
        'address',      //indirizzo fisico
        'city',         
        'postal_code',  
        'phone',  
        'manager_id', //amministratore responsabile del complesso
        'opening_hours', //orari di apertura del complesso
    ];

    //orario di apertura gestiti con json
    protected $casts = [
    'opening_hours' => 'array',
    ];

    //relazione con gli N campi da padel
    public function courts()
    {
        return $this->hasMany(Court::class);
    }

    //amministratore responsabile del complesso
    public function manager()
    {
        return $this->belongsTo(Admin::class, 'manager_id');
    }

    //relazione con le prenotazioni associate a questo complesso
    public function bookings()
    {
        return $this->hasManyThrough(Booking::class, Court::class);
    }

}