<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ProduktImage;
use App\Models\Produkt;

class ProduktSeeder extends Seeder
{
    public function run()
    {
        // Referenčné tabuľky
        DB::table('znacky')->insert([
            ['nazov' => 'Nike'],
            ['nazov' => 'Adidas'],
            ['nazov' => 'Vans'],
            ['nazov' => 'NewBalacne'],
            ['nazov' => 'Converse'],
        ]);

        DB::table('farby')->insert([
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

        DB::table('druhy')->insert([
            ['nazov' => 'tenisky'],
            ['nazov' => 'formalna'],
            ['nazov' => 'outdoor'],
            ['nazov' => 'cizmy'],
            ['nazov' => 'letna'],
        ]);

        DB::table('pohlavia')->insert([
            ['nazov' => 'muzi'],
            ['nazov' => 'zeny'],
            ['nazov' => 'deti'],
        ]);

        // Produkt_topanky
        DB::table('produkty')->insert([
            [
                'name' => 'Nike Air Max',
                'popis' => 'Pohodlné tenisky na behanie',
                'znacka_id' => 1,
                'farba_id' => 1,
                'druh_id' => 1,
                'pohlavie_id' => 1,
                'velkost_od' => 38,
                'velkost_do' => 42,
                'cena' => 99.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
        $produkty = Produkt::all();

        foreach ($produkty as $produkt) {
            ProduktImage::create([
                'product_id' => $produkt->id,
                'image_path' => 'muzi/tenisky/nike_airforce.jpg', // relatívna cesta v storage/app/public/...
            ]);
    
            ProduktImage::create([
                'product_id' => $produkt->id,
                'image_path' => 'muzi/tenisky/nike_airforce2.jpg',
            ]);
        }
    
    }
}