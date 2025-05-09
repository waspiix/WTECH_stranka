<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'meno',
        'priezvisko',
        'email',
        'ulica',
        'mesto',
        'PSC',
        'krajna',
        'platba',
        'dorucenie',
        'cena',
        'zaplatene',
    ];
}
