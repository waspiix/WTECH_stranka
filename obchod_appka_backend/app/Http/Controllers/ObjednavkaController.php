<?php

namespace App\Http\Controllers;

use App\Services\KosikService;
use App\Services\ObjednavkaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObjednavkaController extends Controller
{
    public function __construct(protected ObjednavkaService $objednavka, protected KosikService $kosik) {}

    public function index()
    {
        // ak je pouzivatel prihlaseny formular sa vyplni jeho udajmi
        $user = Auth::user();

        if ($user == false) {
            // ak nieje prihlaseni ale uz zacal objednavku
            $user = (object) session()->get('objednavka', []);
        }

        return view('kosik.objednavka.adresa', ['user' => $user]);
    }



    public function store(Request $request)
    {
        $request->validate([
            'meno' => 'required|string',
            'priezvisko' => 'required|string',
            'email' => 'required|email',
            'telefon' => 'required',
            'ulica' => 'required|string',
            'mesto' => 'required|string',
            'PSC' => 'required|digits:5',
            'krajna' => 'required',
            'dorucenie' => 'required',
        ]);

        $this->objednavka->saveSessionOrder($request);

        return view('kosik.objednavka.platba', [
            'objednavka' => $this->objednavka->getSessionOrder(),
            'items' => $this->kosik->getProducts(),
            'cena_spolu' => $this->kosik->getCena($this->kosik->getProducts())
        ]);
    }

    public function accept(Request $request)
    {
        $request->validate([
            'platba' => 'required|string',
        ]);

        $id = $this->objednavka->saveOrder($request->platba);

        return view(
            'kosik.objednavka.potvrdenie',
            ['id' => $id],
        );
    }
}
