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
            $table->id(); //id dell'admin che è la chiave primaria
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
    }  

    //quando elimino la tabella
    public function down(): void
    {
        Schema::dropIfExists('admins');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
