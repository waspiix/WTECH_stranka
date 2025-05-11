<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->words(2, true),
            'popis' => $this->faker->sentence,
            'brand_id' => rand(1, 5),
            'color_id' => rand(1, 9),
            'type_id' => rand(1, 5),
            'gender_id' => rand(1, 3),
            'velkost_od' => rand(35, 40),
            'velkost_do' => rand(41, 46),
            'cena' => $this->faker->randomFloat(2, 49, 149),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
