<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Znacka extends Model
{
    protected $table = 'znacky';

    protected $fillable = ['nazov'];

    public function produkty()
    {
        return $this->hasMany(Produkt::class);
    }
}

