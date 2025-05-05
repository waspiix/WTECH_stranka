@extends('layouts.app')

@section('content')
    @include('kosik.partials.nav')
    <div class="container bg-light p-3 rounded-5">
        <div class="bg-white p-2 rounded-4">
            <ul class="list-group list-group-flush">
                @foreach ($items as $item)
                    @include('kosik.partials.item', $item)
                @endforeach
            </ul>
        </div>
    </div>
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col p-3">
                <p class="cena">Spolu: <b>{{ $cena_spolu }}€</b></p>
            </div>
            <div class="col p-3 text-end">
                <button type="button" class="btn btn-primary"
                    @if ($cena_spolu == 0) disabled @endif>Pokračovať</button>
            </div>
        </div>
    </div>
@endsection
