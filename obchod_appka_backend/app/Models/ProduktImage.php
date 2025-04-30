<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ProduktImage extends Model
{
    protected $fillable = ['product_id', 'image_path'];

    public function produkt()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
