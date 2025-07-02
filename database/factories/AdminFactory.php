<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
//factory per la creazione di amministratori fittizi
class AdminFactory extends Factory
{
   
    //metodo per definire un amministratore fittizio per il test del DB
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'), 
            'birth_date' => $this->faker->date('Y-m-d', '-18 years'), //almeno 18 anni
            'gender' => $this->faker->randomElement(['M', 'F']),
            'tax_code' => strtoupper(Str::random(16)), //codice fiscale fittizio
            'phone' => $this->faker->phoneNumber,
            'emergency_contact_phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
        ];
    }
}
