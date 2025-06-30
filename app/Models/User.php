<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        ];
    }
}
