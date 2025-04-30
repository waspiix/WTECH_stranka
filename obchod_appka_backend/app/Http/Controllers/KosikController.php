<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KosikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view(
            'kosik.index',
            [
                'items' =>
                [
                    [
                        'nazov' => 'Topanky',
                        'cena' => 99.99,
                        'pocet' => 1,
                        'velkost_od' => 37,
                        'velkost_do' => 42,
                        'velkost_vybrata' => 39,
                        'obrazok' => 'muzi/Tenisky/nike_airforce.jpg',
                    ],
                    [
                        'nazov' => 'Topanky',
                        'cena' => 99.99,
                        'pocet' => 1,
                        'velkost_od' => 37,
                        'velkost_do' => 42,
                        'velkost_vybrata' => 39,
                        'obrazok' => 'muzi/Tenisky/nike_airforce.jpg',
                    ]
                ],
                'cena_spolu' => 99.99 + 99.99
            ]

        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
