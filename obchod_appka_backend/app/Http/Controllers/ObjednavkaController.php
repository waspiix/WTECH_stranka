<?php

namespace App\Http\Controllers;

use App\Services\KosikService;
use App\Services\ObjednavkaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObjednavkaController extends Controller
{
    public function __construct(protected ObjednavkaService $objednavka, protected KosikService $kosik) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();

        if ($user == false) {
            $user = (object) session()->get('objednavka', []);
        }


        return view('kosik.objednavka.adresa', ['user' => $user]);
        // view('kosik.objednavka.platba');
        // view('kosik.objednavka.potvrdenie', ['id' => 45]);
    }


    /**
     * Store a newly created resource in storage.
     */
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
}
