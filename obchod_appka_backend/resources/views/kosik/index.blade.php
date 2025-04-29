@extends('layouts.app')

@section('content')
    @include('kosik.partials.nav')
    <div class="container bg-light p-3 rounded-5">
        <div class="bg-white p-2 rounded-4">
            <ul class="list-group list-group-flush">
                @for ($i = 0; $i < 1; $i++)
                    @include('kosik.partials.item', ['nazov' => $i, 'cena' => 99, 'pocet' => 1])
                @endfor
            </ul>
        </div>
    </div>
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col p-3">
                <p class="cena">Spolu: <b>198,00€</b></p>
            </div>
            <div class="col p-3 text-end">
                <button type="button" class="btn btn-primary">Pokračovať</button>
            </div>
        </div>
    </div>
@endsection
