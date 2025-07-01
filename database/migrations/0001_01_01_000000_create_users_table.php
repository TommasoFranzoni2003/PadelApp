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

        //schema della tabella per i token in caso di reset della password
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        //schema della tabella per le sessioni degli utenti
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
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
