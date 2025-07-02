<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Court;
use App\Models\User;

//factory per la creazione di prenotazioni fittizie
class BookingFactory extends Factory
{
    //funzione per definire le prenotazioni fittizie dei vari campi
    public function definition(): array
    {
        return [
            'start_time' => $this->faker->dateTimeBetween('now', '+1 month'),
            'end_time' => $this->faker->dateTimeBetween('+1 hour', '+2 hours'),
            'status' => $this->faker->randomElement(['confirmed', 'cancelled', 'pending']), //stato della prenotazione
            //creo prima il campo a cui appartiene la prenotazione
            'court_id' => Court::factory(),
            //creo prima l'utente che ha effettuato la prenotazione
            'user_id' => User::factory(),
        ];
    }
}
