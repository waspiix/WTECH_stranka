<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Povoľ mass-assignment pre tieto polia
    protected $fillable = [
        'meno',
        'priezvisko',
        'email',
        'password',
        'passwrd_hash',
        'krajina',
        'mesto',
        'ulica',
        'PSC',
        'admin',
    ];

    // Skryť citlivé údaje pri serializácii (napr. pri JSON odpovediach)
    protected $hidden = [
        'password',
        'passwrd_hash',
        'remember_token',
    ];

    // Typy pre casting
    protected $casts = [
        'email_verified_at' => 'datetime',
        'admin' => 'boolean',
    ];
}
