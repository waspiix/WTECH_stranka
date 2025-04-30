<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    protected $fillable = ['nazov'];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
