<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); //id autoincrementale della prenotazione che funge come chiave primaria
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //chiave esterna all'id del cliente
            $table->foreignId('court_id')->constrained()->onDelete('cascade'); //chiave esterna all'id del campo prenotato
            $table->dateTime('start_time')->index();
            $table->dateTime('end_time')->index();
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending'); //stato della prenotazione
            $table->timestamps();
        });
    }

    //quando elimino la tabella
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
