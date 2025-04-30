<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farba extends Model
{
    protected $table = 'farby';

    protected $fillable = ['nazov'];

    public function produkty()
    {
        return $this->hasMany(Produkt::class);
    }
}
