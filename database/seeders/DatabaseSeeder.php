<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Court;
use App\Models\AvailabilitySchedule as Availability;
use App\Models\Complex;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    //creo i vari seeder per popolare il database
    public function run(): void
    {
       $this->createUserSeeder();

       $this->createComplexSeeder();
       $this->createCourtSeeder();
       $this->createAvailabilitySeeder();
       $this->createBookingSeeder();
    }

    //seeder per creare gli utenti
    private function createUserSeeder()
    {
        //creo un utente specifico
        User::factory()->create([
            'id' => 1, 
            'name' => 'Alberto',
            'surname' => 'Ferrari',
            'email' => 'a.ferrari03.studenti.unibs.it',
            'password' => bcrypt('ironman'),
            'birth_date' => '2003-04-10',
            'gender' => 'M',
            'tax_code' => 'AFRRBT03D10A000Z',
            'phone' => '3270921251',
            'points_accumulated' => 0,
            'is_active' => true,
        ]);
        //creo 10 utenti fittizzi
        User::factory(10)->create();
    }

    //seeder per creare le prenotazioni
    private function createBookingSeeder()
    {
        //creo una prenotazione specifica
        Booking::factory()->create([
            'user_id' => 1, //associata all'utente con ID 1
            'court_id' => 1, //associata al campo con ID 1
            'start_time' => now()->addDays(1)->setHour(10)->setMinute(0),
            'end_time' => now()->addDays(1)->setHour(11)->setMinute(0),
            'status' => Booking::STATUS_CONFIRMED, 
        ]);
        //creo 20 prenotazioni fittizie
        Booking::factory(20)->create();
    }   

    //seeder per creare i campi da gioco
    private function createCourtSeeder()
    {
        //creo un campo specifico
        Court::factory()->create([
            'id' => 1, //imposto l'ID per poterlo associare alle prenotazioni
            'name' => 'Campo 1',
            'type' => 'outdoor',
            'status' => 'active',
            'description' => 'Campo da padel all\'aperto con erba sintetica',
            'location' => 'Lato est del complesso',
            'price_per_hour' => 20.00,
        ]);
        //creo 5 campi da gioco fittizi
        Court::factory(5)->create();
    }

    //seeder per creare le disponibilità dei campi
    private function createAvailabilitySeeder()
    {
        //creo una disponibilità specifica
        Availability::factory()->create([  
            'court_id' => 1, 
            'day_of_week' => 'Monday', 
            'start_time' => '10:00:00',
            'end_time' => '18:00:00',
            'is_available' => true,
        ]);
        //creo 20 disponibilità fittizie
        Availability::factory(20)->create();
    }

    //seeder per creare il complesso dei campi
    private function createComplexSeeder()
    {
        //creo una struttura specifica
        Complex::factory()->create([
            'id' => 1, //imposto l'ID per poterlo associare
            'name' => 'Complesso Sportivo San Paolo',  
            'description' => 'Complesso sportivo con campi da padel legato alla comunità cattolica di San Paolo ',
            'address' => 'Via San Paolo 1',
            'city' => 'Brescia',
            'postal_code' => '25100',
            'phone' => '0301234567',
            'email' => 'padelsanpaolo@sanpaolocrew.org',
            'opening_hours' => [
                'monday' => ['09:00', '20:00'],
                'tuesday' => ['09:00', '20:00'],
                'wednesday' => ['09:00', '22:00'],
                'thursday' => ['09:00', '22:00'],
                'friday' => ['09:00', '24:00'],
                'saturday' => ['08:00', '24:00'],
                'sunday' => ['08:00', '16:00'],
            ],
        ]);
        //creo 3 strutture fittizie 
        Complex::factory(3)->create();
    }

}