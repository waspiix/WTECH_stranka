@extends('layouts.app')

@section('content')
    @include('kosik.partials.nav', ['status' => 2])
    <form class="needs-validation" id="data" action="{{ route('objednavka.store') }}" method="POST" novalidate>
        @csrf
        <div class="container bg-light p-3 rounded-5">
            <div class="bg-white p-2 rounded-4">
                <div class="row g-3 needs-validation">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('meno') is-invalid @enderror" name="meno"
                                id="float_meno" placeholder="Meno" value="{{ old('meno', $user->meno ?? '') }}" />
                            <label for="float_meno">Meno</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('priezvisko') is-invalid @enderror"
                                name="priezvisko" id="float_priezviskoa" placeholder="Priezvisko"
                                value="{{ old('priezvisko', $user->priezvisko ?? '') }}" /><label
                                for="float_priezviskoa">Priezvisko</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="float_email" placeholder="Email" value="{{ old('email', $user->email ?? '') }}" /><label
                                for="float_email">Email</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="tel" class="form-control @error('telefon') is-invalid @enderror" name="telefon"
                                id="float_cislo" placeholder="Tel. cislo"
                                value="{{ old('telefon', $user->telefon ?? '') }}" /><label for="float_cislo">Tel.
                                číslo</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('ulica') is-invalid @enderror" name="ulica"
                                id="float_ulica" placeholder="Ulica" value="{{ old('ulica', $user->ulica ?? '') }}" /><label
                                for="float_ulica">Ulica</label>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('mesto') is-invalid @enderror" name="mesto"
                                id="float_mesto" placeholder="Mesto" value="{{ old('mesto', $user->mesto ?? '') }}" /><label
                                for="float_mesto">Mesto</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('PSC') is-invalid @enderror" name="PSC"
                                id="float_PSC" placeholder="PSC" value="{{ old('PSC', $user->PSC ?? '') }}" /><label
                                for="float_PSC">PSČ</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <select class="form-select" , id="krajna", name="krajna">
                                <option value="Slovensko" selected>Slovensko</option>
                            </select>
                            <label for="kraja">Krajna</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container bg-light p-3 rounded-5 mt-2">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h2>Spôsob doručenia:</h2>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="w-100 btn-group">
                        <input type="radio" class="btn-check" name="dorucenie" id="btnradio1" value="kurier"
                            autocomplete="off" checked />
                        <label class="btn btn-outline-secondary btn-lg" for="btnradio1">Kurier</label>
                        <input type="radio" class="btn-check" name="dorucenie" id="btnradio2" value="posta"
                            autocomplete="off" />
                        <label class="btn btn-outline-secondary btn-lg" for="btnradio2">Pošta</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="container px-4">
            <div class="row gx-5 text-start">
                <div class="col">
                    <div class="p-3 text-end">
                        <button type="submit" form="data" class="btn btn-primary">Pokračovať</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
