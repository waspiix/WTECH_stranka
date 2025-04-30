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

        return view(
            'kosik.index',
            [
                'items' => $products,
                'cena_spolu' => 99.99 + 99.99
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
    public function update(Request $request, string $id)
    {
        //
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
