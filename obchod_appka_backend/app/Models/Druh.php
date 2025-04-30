<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Druh extends Model
{
    protected $table = 'druhy';

    protected $fillable = ['nazov'];

    public function produkty()
    {
        return $this->hasMany(Produkt::class);
    }
}
