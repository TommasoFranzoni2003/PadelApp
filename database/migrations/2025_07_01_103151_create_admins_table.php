<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    //quando creo la tabella per gli admins
    public function up(): void
    {
        //crea lo schema per la tabella degli admins
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('tax_code');
            $table->string('phone')->unique();
            $table->string('emergency_contact_phone')->nullable(); //contatto di emergenza
            $table->string('address')->nullable(); //indirizzo di residenza
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
        Schema::dropIfExists('admins');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
