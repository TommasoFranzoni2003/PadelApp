<?php

namespace App\Models;

class Admin extends User{
   
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'birth_date',
        'gender',
        'tax_code',
        'phone',
        'emergency_contact_phone',
        'address',
    ];

    //Metodo eseguito quando viene creato un nuovo Admin
    protected static function booted()
    {
        static::addGlobalScope('admin', function ($query) { //consente di identificare gli Admin con role='admin'
            $query->where('role', 'admin');
        });

        static::creating(function ($admin) {
            $admin->role = 'admin'; //imposto automaticamente role='admin'
        });
    }

}

?>
