<?php

namespace App\Services;


use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class KosikService
{
    public function getProducts()
    {
        $products = [];

        if ($user = Auth::user()) {
            $products = $user->products()->with('image')->get();
        } else {
            $kosik = session()->get('kosik', []);

            $ids = array_column($kosik, 'product_id');

            $products_list = Product::whereIn('id', $ids)->with('image')->get()->keyBy('id');

            $counter = 0;

            $products = array_map(function ($kosik) use ($products_list, &$counter) {
                $product = clone $products_list[$kosik['product_id']];

                $product->pivot = (object)[
                    'velkost' => $kosik['velkost'],
                    'pocet' => $kosik['pocet'],
                    'id' => $counter++
                ];

                return $product;
            }, $kosik);
        }

        return $products;
    }

    public function getProductsNoImage()
    {
        $products = [];

        if ($user = Auth::user()) {
            $products = $user->products()->get();
        } else {
            $kosik = session()->get('kosik', []);

            $ids = array_column($kosik, 'product_id');

            $products_list = Product::whereIn('id', $ids)->get()->keyBy('id');

            $products = array_map(function ($kosik) use ($products_list, &$counter) {
                $product = clone $products_list[$kosik['product_id']];

                $product->pivot = (object)[
                    'velkost' => $kosik['velkost'],
                    'pocet' => $kosik['pocet'],
                ];

                return $product;
            }, $kosik);
        }

        return $products;
    }

    public function getCena($products)
    {
        $cena = 0;
        foreach ($products as $product) {
            $cena += $product->cena * $product->pivot->pocet;
        }
        return $cena;
    }

    public function addProduct($product_id, $pocet, $velkost)
    {
        if ($user = Auth::user()) {
            $product = Product::find($product_id);
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
    }

    public function updateProduct($id, $action)
    {
        if ($user = Auth::user()) {

            $product = $user->products()->wherePivot('id', $id);
            $pocet = $product->first()->pivot->pocet;

            if ($action === 'inc') {
                $pocet++;
            } elseif ($action === 'dec') {
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

            if ($action === 'inc') {
                $pocet++;
            } elseif ($action === 'dec') {
                $pocet--;
            }


            if ($pocet < 1) {
                array_splice($kosik, $id, 1);
            } else {
                $kosik[$key]['pocet'] = $pocet;
            }

            session(['kosik' => $kosik]);
        }
    }

    public function removeProduct($id)
    {
        if ($user = Auth::user()) {
            $user->products()->wherePivot('id', $id)->detach();
        } else {
            $kosik = session()->get('kosik', []);
            array_splice($kosik, $id, 1);
            session(['kosik' => $kosik]);
        }
    }
}
