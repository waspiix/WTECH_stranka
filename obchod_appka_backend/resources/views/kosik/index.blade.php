@extends('layouts.app')

@section('content')
    @include('kosik.partials.nav', ['status' => 1])
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
                @if ($cena_spolu == 0)
                    <button type="button" class="btn btn-primary" disabled>
                        Pokračovať</button>
                @else
                    <a href="{{ route('objednavka.index') }}" type="button" class="btn btn-primary">
                        Pokračovať</a>
                @endif
            </div>
        </div>
    </div>
@endsection
