<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//classe che rappresenta il modello del cliente che interagisce con il sistema
class User extends Authenticatable
{

    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'birth_date',
        'gender',
        'tax_code',
        'phone',
        'points_accumulated', //punti fedeltà accumulati
        'is_active', //se l'utente è attivo o meno
    ];

    //attributi mai mostrati quando si fa la serializzazione dell'oggetto
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //conversione degli attributi automatica
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', 
            'password' => 'hashed', //laravel cripta automaticamente la password
            'is_active' => 'boolean', //converte in booleano
            'points_accumulated' => 'integer', //converte in intero
            'birth_date' => 'date', //converte in data
        ];
    }

    //prenotazioni associate all'utente
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

