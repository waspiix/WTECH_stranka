<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KosikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cena = 0;
        $products = [];

        if ($user = Auth::user()) {
            $products = $user->products()->with('image')->get();
        } else {
            $kosik = session()->get('kosik', []);

            $ids = array_column($kosik, 'product_id');

            $products_list = Product::whereIn('id', $ids)->with('image')->get()->keyBy('id');

            $counter = 0;

            $products = array_map(function ($kosik) use ($products_list, &$counter) {
                $product = $products_list[$kosik['product_id']];

                $product->pivot = (object)[
                    'velkost' => $kosik['velkost'],
                    'pocet' => $kosik['pocet'],
                    'id' => $counter++
                ];

                return $product;
            }, $kosik);

            // foreach ($kosik as &$test) {
            //     $test['pivot'] = ['velkost' => $test['velkost']];
            // }
        }

        // return $products;


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

        $product_id = 2;
        $pocet = 1;
        $velkost = 40;


        if ($user = Auth::user()) {
            $product = Product::find(1);
            $user->products()->attach($product->id, ['pocet' => $pocet, 'velkost' => $velkost]);
        } else {
            $key = $product_id . '_' . $velkost;
            $kosik = session('kosik', []);
            $kosik[$key] = [
                'product_id' => $product_id,
                'pocet' => $pocet,
                'velkost' => $velkost
            ];
            session(['kosik' => $kosik]);
        }

        return redirect('/kosik');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
        if ($user = Auth::user()) {

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
        } else {
            $kosik = session()->get('kosik', []);

            $key = array_keys($kosik)[$id];

            $pocet = $kosik[$key]['pocet'];

            if ($request->action === 'inc') {
                $pocet++;
            } elseif ($request->action === 'dec') {
                $pocet--;
            }


            if ($pocet < 1) {
                array_splice($kosik, $id, 1);
            } else {
                $kosik[$key]['pocet'] = $pocet;
            }

            session(['kosik' => $kosik]);
        }

        return redirect('/kosik');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
        if ($user = Auth::user()) {
            $user->products()->wherePivot('id', $id)->detach();
        } else {
            $kosik = session()->get('kosik', []);
            array_splice($kosik, $id, 1);
            session(['kosik' => $kosik]);
        }

        return redirect('/kosik');
    }
}
