<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //creo la tabella nel database per gli utenti
    public function up(): void
    {
        //crea lo schema per la tabella degli utenti
        Schema::create('users', function (Blueprint $table) {
            $table->id(); //id dell'utente che è la chiave primaria
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('tax_code');
            $table->string('phone')->unique();
            $table->integer('points_accumulated')->default(0); //punti fedeltà accumulati
            $table->boolean('is_active')->default(true); //se l'utente è attivo
            $table->rememberToken();
            $table->timestamps();
        });
    }

    //quando elimino la tabella
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
