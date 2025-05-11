<?php

namespace App\Services;

use App\Services\KosikService;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ObjednavkaService
{
    protected KosikService $kosik;

    public function __construct(KosikService $kosik)
    {
        $this->kosik = $kosik;
    }


    public function saveSessionOrder($request)
    {
        //este dorucenie
        $objednavka = [
            'meno' => $request->meno,
            'priezvisko' => $request->priezvisko,
            'email' => $request->email,
            'telefon' => $request->telefon,
            'ulica' => $request->ulica,
            'mesto' => $request->mesto,
            'PSC' => $request->PSC,
            'krajna' => $request->krajna,
            'dorucenie' => $request->dorucenie,
        ];
        session(['objednavka' => $objednavka]);
    }

    public function getSessionOrder()
    {
        return (object) session()->get('objednavka', []);
    }

    public function saveOrder($platba)
    {
        $products = $this->kosik->getProductsNoImage();

        $data = (array)$this->getSessionOrder();
        $data['platba'] = $platba;
        $data['user_id'] = Auth::id();
        $data['cena'] = $this->kosik->getCena($products);

        $order = Order::create($data);

        foreach ($products as $product) {
            $order->products()->attach($product->id, [
                'velkost' => $product->pivot->velkost,
                'pocet' => $product->pivot->pocet,
            ]);
        }

        if ($user = Auth::user()) {
            $user->products()->detach();
        } else {
            session()->forget(['kosik']);
        }


        return $order->id;
    }
}
