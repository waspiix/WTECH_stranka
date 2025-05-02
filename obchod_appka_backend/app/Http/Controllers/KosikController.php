<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KosikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::find(2);

        $products = $user->products()->with('image')->get();

        $cena = 0;

        foreach ($products as $product) {
            $cena += $product->cena * $product->pivot->pocet;
        }

        return view(
            'kosik.index',
            [
                'items' => $products,
                'cena_spolu' => $cena,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $user = User::find(2);
        $product = Product::find(1);

        $user->products()->attach($product->id, ['pocet' => 1, 'velkost' => 40]);

        return redirect('/kosik');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
        $user = User::find(2);

        $product = $user->products()->wherePivot('id', $id);
        $pocet = $product->first()->pivot->pocet;

        if ($request->action === 'inc') {
            $pocet++;
        } elseif ($request->action === 'dec') {
            $pocet--;
        }

        if ($pocet < 1) {
            $product->detach();
        } else {
            $product->first()->pivot->update(['pocet' => $pocet]);
        }

        return redirect('/kosik');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
        $user = User::find(2);
        $user->products()->wherePivot('id', $id)->detach();

        return redirect('/kosik');
    }
}
