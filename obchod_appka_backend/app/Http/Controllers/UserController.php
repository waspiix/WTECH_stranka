<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        $user->meno = $request->input('meno');
        $user->priezvisko = $request->input('priezvisko');
        $user->email = $request->input('email');
        $user->telefon = $request->input('telefon');
        $user->save();

        return redirect()->back()->with('success', 'Profil bol aktualizovaný.');
    }

    public function updateAddress(Request $request)
    {
        $user = Auth::user();

        $user->krajina = $request->input('krajina');
        $user->ulica = $request->input('ulica');
        $user->mesto = $request->input('mesto');
        $user->PSC = $request->input('PSC');
        $user->save();

        return redirect()->back()->with('success', 'Adresa bola aktualizovaná.');
    }
}
