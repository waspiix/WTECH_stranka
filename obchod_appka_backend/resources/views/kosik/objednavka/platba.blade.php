@extends('layouts.app')

@section('content')
    @include('kosik.partials.nav', ['status' => 3])
    <div class="container bg-light p-3 rounded-5">
        <div class="bg-white p-2 rounded-4">
            <h2>Súhrn:</h2>
            <ul class="list-group">
                @foreach ($items as $item)
                    @include('kosik.objednavka.partial.item', $item)
                @endforeach
                <li class="list-group-item bg-light">
                    <div class="row p-2">
                        <div class="col">
                            <div class="cena">Spolu:</div>
                        </div>
                        <div class="col text-end">
                            <div class="cena"><b>{{ $cena_spolu }}€</b></div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="my-3">
                <h2>Dodacie údaje:</h2>
                <address>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">{{ $objednavka->meno }}</div>
                                <div class="col">{{ $objednavka->priezvisko }}</div>
                            </div>
                        </li>
                        <li class="list-group-item">{{ $objednavka->email }}</li>
                        <li class="list-group-item">{{ $objednavka->telefon }}</li>
                        <li class="list-group-item">{{ $objednavka->ulica }}</li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">{{ $objednavka->mesto }}</div>
                                <div class="col">{{ $objednavka->PSC }}</div>
                            </div>
                        <li class="list-group-item">{{ $objednavka->krajna }}</li>
                        </li>
                        <li class="list-group-item">{{ 'Druh doručenia: ' . $objednavka->dorucenie }}</li>
                        </li>
                    </ul>
                </address>
            </div>

            <h2>Spôsob platby:</h2>
            <form id="accept" action="{{ route('objednavka.accept') }}" method="POST">
                @csrf
                <div class="w-100 btn-group" role="group">
                    <input id="hotovost_l" type="radio" class="btn-check" name="platba" value="hotovost" checked />
                    <label class="btn btn-outline-primary" for="hotovost_l">
                        <img src="{{ asset('pictures/kosik/euro.svg') }}" class="bg-white rounded-2 p-1" height="50"
                            alt="hotovost" />
                        <br />
                        Hotovosť
                    </label>
                    <input id="karta_l" type="radio" class="btn-check" name="platba" value="karta" />
                    <label class="btn btn-outline-primary" for="karta_l">
                        <img src="{{ asset('pictures/kosik/karta.svg') }}" class="bg-white rounded-2 px-2" height="50"
                            alt="karta" />
                        <br />
                        Karta</label>
                </div>
            </form>
        </div>
    </div>
    <div class="container px-4">
        <div class="row gx-5 text-start">
            <div class="col">
                <div class="p-3 text-end">
                    <button type="submit" form="accept" class="btn btn-primary">Pokračovať</button>
                </div>
            </div>
        </div>
    </div>
@endsection
