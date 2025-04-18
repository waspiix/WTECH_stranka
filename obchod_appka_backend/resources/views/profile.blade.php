@extends('layouts.app')

@section('content')
    @include('partials.navigation')
    <button class="text-format back-button" onclick="window.location.href='{{ url('/') }}';">< Späť</button>

    <div class="row mt-4 gap-4" style="padding: 0px 100px;">          
        <div class="col-md-5 card p-3 shadow">
            <div class="card-body">
                <h1 class="text_nadpis mb-3">Zákaznícky profil</h1>
                <img src="pictures/profile_icon.png" alt="profil" class="ikona mb-3" width="100">
                
                <form class="text-format">
                    <div class="mb-3">
                        <label for="name" class="form-label">Meno</label>
                        <input type="text" class="form-control" id="name" value="{{ Auth::user()->meno }}">
                    </div>

                    <div class="mb-3">
                        <label for="surname" class="form-label">Priezvisko</label>
                        <input type="text" class="form-control" id="surname" value="{{ Auth::user()->priezvisko }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefón</label>
                        <input type="tel" class="form-control" id="phone" value="{{ Auth::user()->phone }}">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Uložiť zmeny</button>
                </form>
            </div>
        </div>

        <div class="col-md-5 card p-3 shadow">
            <div class="card-body">
                <h1 class="text_nadpis mb-3">Adresa doručenia</h1>
                <img src="pictures/address_icon.png" alt="profil" class="ikona mb-3" width="100">
                
                <form class="text-format">
                    <div class="mb-3">
                        <label for="address" class="form-label">Ulica</label>
                        <input type="text" class="form-control" id="address" value="{{ Auth::user()->address }}">
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">Obec</label>
                        <input type="text" class="form-control" id="city" value="{{ Auth::user()->city }}">
                    </div>

                    <div class="mb-5">
                        <label for="postal_code" class="form-label">PSČ</label>
                        <input type="text" class="form-control" id="postal_code" value="{{ Auth::user()->postal_code }}">
                    </div>

                    <button type="submit" class="mt-5 btn btn-primary w-100">Uložiť zmeny</button>
                </form>
            </div>
        </div>
    </div>
@endsection