<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ProduktImage;
use App\Models\Produkt;

class ProduktSeeder extends Seeder
{
    public function run()
    {
        // Referenčné tabuľky
        DB::table('brands')->insert([
            ['nazov' => 'Nike'],
            ['nazov' => 'Adidas'],
            ['nazov' => 'Vans'],
            ['nazov' => 'NewBalacne'],
            ['nazov' => 'Converse'],
        ]);

        DB::table('colors')->insert([
            ['nazov' => 'Čierna'],
            ['nazov' => 'Biela'],
            ['nazov' => 'Modrá'],
            ['nazov' => 'Červená'],
            ['nazov' => 'Zelená'],
            ['nazov' => 'Žltá'],
            ['nazov' => 'Oranžová'],
            ['nazov' => 'Fialová'],
            ['nazov' => 'Hnedá'],
        ]);

        DB::table('types')->insert([
            ['nazov' => 'tenisky'],
            ['nazov' => 'formalna'],
            ['nazov' => 'outdoor'],
            ['nazov' => 'cizmy'],
            ['nazov' => 'letna'],
        ]);

        DB::table('genders')->insert([
            ['nazov' => 'muzi'],
            ['nazov' => 'zeny'],
            ['nazov' => 'deti'],
        ]);

        // Produkt_topanky
        DB::table('products')->insert([
            [
                'name' => 'Nike Air Max',
                'popis' => 'Pohodlné tenisky na behanie',
                'brand_id' => 1,
                'color_id' => 1,
                'type_id' => 1,
                'gender_id' => 1,
                'velkost_od' => 38,
                'velkost_do' => 42,
                'cena' => 99.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
        $produkty = Product::all();

        foreach ($produkty as $produkt) {
            Image::create([
                'product_id' => $produkt->id,
                'image_path' => 'muzi/tenisky/nike_airforce.jpg', // relatívna cesta v storage/app/public/...
            ]);

            Image::create([
                'product_id' => $produkt->id,
                'image_path' => 'muzi/tenisky/nike_airforce2.jpg',
            ]);
        }
    }
}
