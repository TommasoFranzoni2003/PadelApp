<?php

namespace App\Models;

class Admin extends Authenticatable{
   
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
}

?>
