<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZnackyTable extends Migration
{
    public function up()
    {
        Schema::create('znacky', function (Blueprint $table) {
            $table->id(); 
            $table->string('nazov', 32); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('znacky');
    }
}