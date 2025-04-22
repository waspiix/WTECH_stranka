<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduktyTable extends Migration
{
    public function up()
    {
        Schema::create('produkty', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 32); 
            $table->string('popis', 512); 
            $table->unsignedBigInteger('znacka_id')->nullable(); 
            $table->unsignedBigInteger('farba_id')->nullable(); 
            $table->unsignedBigInteger('druh_id')->nullable(); 
            $table->unsignedBigInteger('pohlavie_id')->nullable(); 
            $table->integer('velkost_od'); 
            $table->integer('velkost_do'); 
            $table->float('cena', 5, 2); 
            $table->timestamps(); 

            // Cudzie kľúče
            $table->foreign('znacka_id')->references('id')->on('znacky')->onDelete('set null');
            $table->foreign('farba_id')->references('id')->on('farby')->onDelete('set null');
            $table->foreign('druh_id')->references('id')->on('druhy')->onDelete('set null');
            $table->foreign('pohlavie_id')->references('id')->on('pohlavia')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('produkty');
    }
}