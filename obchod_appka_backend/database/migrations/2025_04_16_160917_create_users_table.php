<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('meno', 64);
            $table->string('priezvisko', 64);
            $table->string('email', 64)->unique();
            $table->string('password', 128);
            $table->string('passwrd_hash', 128);
            $table->string('krajina', 32)->nullable();
            $table->string('mesto', 32)->nullable();
            $table->string('ulica', 64)->nullable();
            $table->string('PSC', 10)->nullable();
            $table->boolean('admin')->default(false);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
