<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //quando creo la tabella per le disponibilità del campo
    public function up(): void
    {
        Schema::create('availability_schedule', function (Blueprint $table) {
            $table->id(); // ID univoco per la disponibilità
            $table->foreignId('court_id')->constrained()->onDelete('cascade'); //chiave esterna al campo a cui è riferita la disponibilità
            $table->time('start_time'); 
            $table->time('end_time'); 
            $table->enum('day_of_week', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']); //giorno della settimana
            $table->boolean('is_available')->default(true); //disponibilità del campo per
            $table->timestamps();
            //evito di avere duplicati per lo stesso giorno della settimana
            $table->unique(['court_id', 'day_of_week', 'start_time', 'end_time']);
        });
    }

    //quando elimino la tabella
    public function down(): void
    {
        Schema::dropIfExists('availability_schedule');
    }
};
