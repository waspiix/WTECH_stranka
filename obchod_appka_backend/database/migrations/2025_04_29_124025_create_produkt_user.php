<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produkt_user', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('produkt_id');
            $table->integer('pocet')->default(1);
            $table->integer('velkost');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('produkt_id')->references('id')->on('produkty');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produkt_user');
    }
};
