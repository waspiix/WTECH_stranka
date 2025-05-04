@extends('layouts.app')

@section('content')
    @include('partials.navigation')
    <button class="text-format back-button" onclick="window.location.href='{{ url('/') }}';">< Späť</button>

    <div class="row mt-4 gap-4" style="padding: 0px 100px;">          

        {{-- Profil --}}
        <div class="col-md-5 mb-5 card p-3 shadow">
            <div class="card-body">
                <h1 class="text_nadpis mb-3">Zákaznícky profil</h1>
                <img src="{{ asset('storage/profile_icon.png') }}" alt="profil" class="ikona mb-3" width="100">

                <form class="text-format" method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Meno</label>
                        <input type="text" class="form-control" name="meno" value="{{ Auth::user()->meno }}">
                    </div>

                    <div class="mb-3">
                        <label for="surname" class="form-label">Priezvisko</label>
                        <input type="text" class="form-control" name="priezvisko" value="{{ Auth::user()->priezvisko }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                    </div>

                    <div class="mb-5">
                        <label for="phone" class="form-label">Telefón</label>
                        <input type="tel" class="form-control" name="telefon" value="{{ Auth::user()->telefon }}">
                    </div>

                    <button type="submit" class="mt-3 btn btn-primary w-100">Uložiť zmeny</button>
                </form>
            </div>
        </div>

        {{-- Adresa --}}
        <div class="col-md-5 mb-5 card p-3 shadow">
            <div class="card-body">
                <h1 class="text_nadpis mb-3">Adresa doručenia</h1>
                <img src="{{ asset('storage/address_icon.png') }}" alt="profil" class="ikona mb-3" width="100">

                <form class="text-format" method="POST" action="{{ route('profile.address.update') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="krajina" class="form-label">Krajina</label>
                        <input type="text" class="form-control" name="krajina" value="{{ Auth::user()->krajina }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="address" class="form-label">Ulica</label>
                        <input type="text" class="form-control" name="ulica" value="{{ Auth::user()->ulica }}">
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">Obec</label>
                        <input type="text" class="form-control" name="mesto" value="{{ Auth::user()->mesto }}">
                    </div>

                    <div class="mb-5">
                        <label for="postal_code" class="form-label">PSČ</label>
                        <input type="text" class="form-control" name="PSC" value="{{ Auth::user()->PSC }}">
                    </div>

                    <button type="submit" class="mt-3 btn btn-primary w-100">Uložiť zmeny</button>
                </form>
            </div>
        </div>
    </div>
@endsection
