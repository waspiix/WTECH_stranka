<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarbyTable extends Migration
{
    public function up()
    {
        Schema::create('farby', function (Blueprint $table) {
            $table->id();
            $table->string('nazov', 32);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('farby');
    }
}