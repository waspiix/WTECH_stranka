<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produkt extends Model
{
    protected $table = 'produkty';

    protected $fillable = [
        'name',
        'popis',
        'znacka_id',
        'farba_id',
        'druh_id',
        'pohlavie_id',
        'velkost_od',
        'velkost_do',
        'cena',
    ];

    public function znacka()
    {
        return $this->belongsTo(Znacka::class);
    }

    public function farba()
    {
        return $this->belongsTo(Farba::class);
    }

    public function druh()
    {
        return $this->belongsTo(Druh::class);
    }

    public function pohlavie()
    {
        return $this->belongsTo(Pohlavie::class);
    }
    public function images()
    {
        return $this->hasMany(ProduktImage::class, 'product_id');
    }
}
