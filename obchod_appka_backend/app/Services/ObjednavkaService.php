<?php

namespace App\Services;

use App\Services\KosikService;
use App\Models\Product;
use APP\Models\Order;
use Illuminate\Support\Facades\Auth;

class ObjednavkaService
{
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
}
