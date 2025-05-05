@extends('layouts.app')

@section('content')
    @include('kosik.partials.nav')
    <div class="container bg-light p-3 rounded-5">
        <div class="bg-white p-2 rounded-4">
            <form class="row g-3 needs-validation" novalidate>
                <!-- cez to sm este pridat stackovanie -->
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="Email" id="float_meno" placeholder="Meno" /><label
                            for="float_meno">Meno</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="Email" id="float_priezviskoa"
                            placeholder="Priezvisko" /><label for="float_priezviskoa">Priezvisko</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="email" class="form-control" name="Email" id="float_email"
                            placeholder="Email" /><label for="float_email">Email</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="tel" class="form-control" name="Tel. Cislo" id="float_cislo"
                            placeholder="Tel. cislo" /><label for="float_cislo">Tel. číslo</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="Ulica" id="float_ulica"
                            placeholder="Ulica" /><label for="float_ulica">Ulica</label>
                    </div>
                </div>
                <div class="col-8">
                    <!-- <div class="col-sm-12 col-md-6"> -->
                    <div class="form-floating">
                        <input type="text" class="form-control" name="Mesto" id="float_mesto"
                            placeholder="Mesto" /><label for="float_mesto">Mesto</label>
                    </div>
                </div>
                <div class="col-4">
                    <!-- <div class="col-sm-12 col-md-6"> -->
                    <div class="form-floating">
                        <input type="text" class="form-control" name="PSC" id="float_psc" placeholder="PSC" /><label
                            for="float_psc">PSČ</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <select class="form-select" , id="krajna">
                            <option value="1" selected>Slovensko</option>
                        </select>
                        <label for="kraja">Krajna</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container bg-light p-3 rounded-5 mt-2">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2>Spôsob doručenia:</h2>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="w-100 btn-group">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked />
                    <label class="btn btn-outline-secondary btn-lg" for="btnradio1">Kurier</label>
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" />
                    <label class="btn btn-outline-secondary btn-lg" for="btnradio2">Pošta</label>
                </div>
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
