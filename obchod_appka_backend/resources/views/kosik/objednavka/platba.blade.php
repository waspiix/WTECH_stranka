@extends('layouts.app')

@section('content')
    @include('kosik.partials.nav')
    <div class="container bg-light p-3 rounded-5">
        <div class="bg-white p-2 rounded-4">
            <h2>Súhrn:</h2>
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row align-items-center text-center">
                        <div class="col-12 col-sm-3">
                            <img src="../pictures/muzi/Tenisky/nike_airforce.jpg" alt="nike airforce" class="w-75 rounded-2" />
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="produkt_suhrn">Nike Air Force</div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <div class="produkt_suhrn">42</div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <div class="produkt_suhrn">99,00€</div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item bg-light">
                    <div class="row p-2">
                        <div class="col">
                            <div class="cena">Spolu:</div>
                        </div>
                        <div class="col text-end">
                            <div class="cena"><b>198 €</b></div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="my-3">
                <!-- toto upravit este -->
                <h2>Dodacie údaje:</h2>
                <address>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Fero</div>
                                <div class="col">Mrkvicka</div>
                            </div>
                        </li>
                        <li class="list-group-item">Dlha ulica 168/2</li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">Velmi dlhe mesto</div>
                                <div class="col">13456</div>
                            </div>
                        </li>
                    </ul>
                </address>
            </div>

            <h2>Spôsob platby:</h2>
            <div class="w-100 btn-group" role="group">
                <input id="hotovost_l" type="radio" class="btn-check" name="sposob_platby" />
                <label class="btn btn-outline-primary" for="hotovost_l">
                    <img src="{{ asset('pictures/kosik/euro.svg') }}" class="bg-white rounded-2 p-1" height="50"
                        alt="" />
                    <br />
                    Hotovosť
                </label>
                <input id="karta_l" type="radio" class="btn-check" name="sposob_platby" />
                <label class="btn btn-outline-primary" for="karta_l">
                    <img src="{{ asset('pictures/kosik/karta.svg') }}" class="bg-white rounded-2 px-2" height="50"
                        alt="" />
                    <br />
                    Karta</label>
            </div>
        </div>
    </div>
    <div class="container px-4">
        <div class="row gx-5 text-start">
            <div class="col">
                <div class="p-3 text-end">
                    <button type="button" class="btn btn-primary">Pokračovať</button>
                </div>
            </div>
        </div>
    </div>
@endsection
