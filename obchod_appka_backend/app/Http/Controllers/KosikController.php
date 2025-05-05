<?php

namespace App\Http\Controllers;

use App\Services\KosikService;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KosikController extends Controller
{
    public function __construct(protected KosikService $kosik) {}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = $this->kosik->getProducts();
        $cena = $this->kosik->getCena($products);

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
        $this->kosik->addProduct($request->id, $request->pocet, $request->velkost);

        return redirect('/kosik');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
        $this->kosik->updateProduct($id, $request->action);

        return redirect('/kosik');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
        $this->kosik->removeProduct($id);

        return redirect('/kosik');
    }
}
