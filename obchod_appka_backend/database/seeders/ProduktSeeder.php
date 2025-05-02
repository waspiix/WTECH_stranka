<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ProductImage;

class ProduktSeeder extends Seeder
{
    public function run()
    {
        // Referenčné tabuľky
        DB::table('brands')->insert([
            ['nazov' => 'Nike'],
            ['nazov' => 'Adidas'],
            ['nazov' => 'Vans'],
            ['nazov' => 'NewBalance'],
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
                'name' => 'Nike Air Force',
                'popis' => 'Pohodlné tenisky na behanie',
                'brand_id' => 1,
                'color_id' => 2,
                'type_id' => 1,
                'gender_id' => 1,
                'velkost_od' => 38,
                'velkost_do' => 42,
                'cena' => 99.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        DB::table('products')->insert([
            [
                'name' => 'New Balance 1906',
                'popis' => 'Pohodlné tenisky na behanie',
                'brand_id' => 4,
                'color_id' => 9,
                'type_id' => 1,
                'gender_id' => 1,
                'velkost_od' => 38,
                'velkost_do' => 44,
                'cena' => 102.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        DB::table('products')->insert([
            [
                'name' => 'Adidas Superstar',
                'popis' => 'Biele adidas superstar tenisky',
                'brand_id' => 2,
                'color_id' => 2,
                'type_id' => 1,
                'gender_id' => 1,
                'velkost_od' => 38,
                'velkost_do' => 43,
                'cena' => 89.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        DB::table('products')->insert([
            [
                'name' => 'Adidas Campus',
                'popis' => 'Cierne adidas tenisky',
                'brand_id' => 2,
                'color_id' => 1,
                'type_id' => 1,
                'gender_id' => 1,
                'velkost_od' => 38,
                'velkost_do' => 44,
                'cena' => 79.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
        

        $produkty = Product::all();

        $imagesByProduct = [
            'Nike Air Force' => [
                'muzi/tenisky/nike_airforce.jpg',
                'muzi/tenisky/nike_airforce2.jpg',
            ],
            'New Balance 1906' => [
                'muzi/tenisky/newBalance_1906_brown.jpg',
                'muzi/tenisky/newBalance_1906_brown2.jpg',
            ],
            'Adidas Superstar' => [
                'muzi/tenisky/adidasSuperstar_white.jpg',
                'muzi/tenisky/adidasSuperstar2.jpg',
            ],
            'Adidas Campus' => [
                'muzi/tenisky/adidasCampus_black.jpg',
                'muzi/tenisky/adidasCampus_black2.jpg',
            ],
        ];
        
        foreach ($produkty as $produkt) {
            $nazov = $produkt->name;
        
            if (isset($imagesByProduct[$nazov])) {
                foreach ($imagesByProduct[$nazov] as $imagePath) {
                    Image::create([
                        'product_id' => $produkt->id,
                        'image_path' => $imagePath,
                    ]);
                }
            }
        }
        Product::factory(10)->create();
    }
}
