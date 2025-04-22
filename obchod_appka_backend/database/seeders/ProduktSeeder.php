<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['nazov' => 'Tenisky'],
            ['nazov' => 'Formálna'],
            ['nazov' => 'Outdoor'],
            ['nazov' => 'Čižmy'],
            ['nazov' => 'Letná'],
        ]);

        DB::table('pohlavia')->insert([
            ['nazov' => 'Muži'],
            ['nazov' => 'Ženy'],
            ['nazov' => 'Deti'],
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
    }
}