<?php

namespace App\Models;

class Customer extends User
{
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'birth_date',
        'gender',
        'tax_code',
        'phone',
        'points_accumulated', //punti "fedeltà" accumulati dal cliente
        'is_active', //indica se il cliente è attivo o meno
    ];

    //Metodo eseguito quando viene creato un nuovo Customer
    protected static function booted()
    {
        static::addGlobalScope('customer', function ($query) { //consente di identificare gli Customer con role='customer'
            $query->where('role', 'customer');
        });

        static::creating(function ($customer) {
            $customer->role = 'customer'; //imposto automaticamente role='customer'
        });
    }
}