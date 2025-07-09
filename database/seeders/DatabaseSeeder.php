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
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    //creo i vari seeder per popolare il database
    public function run(): void
    {
        $this->createPermissionSeeder();
        $this->createRoleSeeder();
        $this->createUserSeeder();
        $this->createComplexSeeder();
        $this->createCourtSeeder();
        $this->createAvailabilitySeeder();
        $this->createBookingSeeder();
    }

    //seeder per creare gli utenti
    private function createUserSeeder()
    {
        //admin con id=1
        User::factory()->create([
            'name' => 'Alessandro',
            'surname' => 'Belussi',
            'email' => 'a.belussi007@studenti.unibs.it',
            'password' => bcrypt('0000'),
            'birth_date' => '2003-04-29',
            'gender' => 'male',
            'tax_code' => 'ABLSLS03D29A000Z',
            'phone' => '3404869403',
            'is_active' => true,
        ]);
        User::find(1)->assignRole('admin'); //assegno il ruolo di admin all'utente con ID 1
        //admin con id=2
        User::factory()->create([
            'name' => 'Tommaso',
            'surname' => 'Franzoni',
            'email' => 't.franzoni@studenti.unibs.it',
            'password' => bcrypt('1234'),
            'birth_date' => '2003-07-07',
            'gender' => 'male',
            'tax_code' => 'FRNTSM03L07A000Z',
            'phone' => '3313512921',
            'is_active' => true,
        ]);
        User::find(2)->assignRole('admin'); //assegno il ruolo di admin all'utente con ID 1
        //admin con id=3
        User::factory()->create([
            'name' => 'Vincenzo',
            'surname' => 'Ingiaimo',
            'email' => 'v.ingiaimo@studenti.unibs.it',
            'password' => bcrypt('4321'),
            'birth_date' => '2003-10-15',
            'gender' => 'male',
            'tax_code' => 'INGVNC03D15A000Z',
            'phone' => '3473465119',
            'is_active' => true,
        ]);
        User::find(3)->assignRole('admin'); //assegno il ruolo di admin all'utente con ID 1
        //creo un utente specifico
        $simpleUser= User::factory()->create([
            'name' => 'Alberto',
            'surname' => 'Ferrari',
            'email' => 'a.ferrari03@studenti.unibs.it',
            'password' => bcrypt('ironman'),
            'birth_date' => '2003-04-10',
            'gender' => 'male',
            'tax_code' => 'AFRRBT03D10A000Z',
            'phone' => '3270921251',
            'is_active' => true,
        ]);
        //assegno il ruolo di admin all'utente con ID 1
        $simpleUser->assignRole('user');
        //creo 10 utenti fittizzi
        $users= User::factory(10)->create();
        //assegno a tutti gli utenti il ruolo di user
        foreach ($users as $user) {
            $user->assignRole('user');
        }
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
            'number_of_players' => [2, 4][rand(0, 1)],
            'racket_needed' => (bool) rand(0, 1),
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
            'image_path' => 'courts/AjS1te4NkWlmAHS8JGVDrACHJBGyXckP2sbP95WN.webp'
        ]);

        //creo un campo specifico
        Court::factory()->create([
            'id' => 2, //imposto l'ID per poterlo associare alle prenotazioni
            'name' => 'Campo 1',
            'type' => 'outdoor',
            'status' => 'active',
            'description' => 'Campo da padel all\'aperto con erba sintetica',
            'location' => 'Lato est del complesso',
            'price_per_hour' => 20.00,
            'image_path' => 'courts/l2Sk9y4SZQm4cAMIZYqnYPeWFvTBgv8ZbYVfCnIz.webp'
        ]);

        //creo un campo specifico
        Court::factory()->create([
            'id' => 3, //imposto l'ID per poterlo associare alle prenotazioni
            'name' => 'Campo 1',
            'type' => 'outdoor',
            'status' => 'active',
            'description' => 'Campo da padel all\'aperto con erba sintetica',
            'location' => 'Lato est del complesso',
            'price_per_hour' => 20.00,
            'image_path' => 'courts/OhDOJkY40iHozM9lx5oPFRG5DzNlKv7wmYsFHchv.webp'
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

    private function createPermissionSeeder()
    {
        //permessi dell'applicazione
        Permission::create(['name' => 'booking_create']);
        Permission::create(['name' => 'booking_view']);
        Permission::create(['name' => 'booking_cancel']);
        Permission::create(['name' => 'court_create']);
        Permission::create(['name' => 'court_view']);
        Permission::create(['name' => 'court_edit']);
        Permission::create(['name' => 'court_delete']);
        Permission::create(['name' => 'complex_create']);
        Permission::create(['name' => 'complex_view']);
        Permission::create(['name' => 'complex_edit']);
        Permission::create(['name' => 'complex_delete']);
    }

    private function createRoleSeeder(): void
    {
        //ruolo di amministratore
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo([
            'booking_create',
            'booking_view',
            'booking_cancel',
            'court_create',
            'court_view',
            'court_edit',
            'court_delete',
            'complex_create',
            'complex_view',
            'complex_edit',
            'complex_delete'
        ]);
        //ruolo di utente
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo([
            'booking_create',
            'booking_view',
            'booking_cancel',
            'court_view',
            'complex_view'
        ]);
    }
}