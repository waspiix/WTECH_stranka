<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('pocet', 'velkost')->withTimestamps();
    }
}
