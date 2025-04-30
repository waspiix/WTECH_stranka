<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pohlavie extends Model
{
    protected $table = 'pohlavia';

    protected $fillable = ['nazov'];

    public function produkty()
    {
        return $this->hasMany(Produkt::class);
    }
}

