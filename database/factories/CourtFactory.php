<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Complex;

//factory per la creazione di campi fittizi
class CourtFactory extends Factory
{
    //funzione per definire i campi fittizi
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word . ' Court',
            'type' => $this->faker->randomElement(['indoor', 'outdoor']), //tipo di campo
            'description' => $this->faker->sentence(10), //Descrizione del campo
            'status' => $this->faker->randomElement(['active', 'maintenance','inactive']), //Stato del campo
            'location' => $this->faker->address,
            'price_per_hour' => $this->faker->numberBetween(10, 50), //Prezzo per ora tra 10 e 50
            //creo prima il complex a cui appartiene il campo
            'complex_id' => Complex::factory(),
        ];
    }
}
