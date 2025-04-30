<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'meno',
        'priezvisko',
        'email',
        'telefon',
        'password',
        'krajina',
        'mesto',
        'ulica',
        'PSC',
        'admin',
    ];

    // Skryť citlivé údaje
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Typy pre casting
    protected $casts = [
        'email_verified_at' => 'datetime',
        'admin' => 'boolean',
    ];
}
