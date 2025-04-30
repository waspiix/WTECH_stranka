@extends('layouts.app')

@section('content')
    @include('partials.navigation')

    <article class="nahlad-container">
        <h1 class="text_nadpis">Ženská sekcia</h1>
        <h2 class="text-format">Ponúkame najnovšie výbery produktov, prehliadaj v rámci širokého ženského sortimentu</h2>
    </article>

    <div class="pohlavie_obrazky-container">
        <img src="{{ asset('storage/zeny/nahlad/zena.jpg') }}" alt="muz" class="moj-obrazok">
        <img src="{{ asset('storage/zeny/nahlad/zena_topanky.jpg') }}" alt="topanky" class="obrazok-muz_topanky">
    </div>
    @include('partials.produkt-filtre')
    @if (isset($produkty) && $produkty->count())
        <div class="container mt-5">
            <h2 class="text-format mb-3">
                Máte zobrazené:
                {{ ucfirst($pohlavie) }} ->
                {{ ucfirst($kategoria ?? 'všetky') }}
            </h2>

            <div class="row">
                @foreach ($produkty as $produkt)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 shadow">
                            @if ($produkt->image->isNotEmpty())
                                <img src="{{ asset('storage/' . $produkt->image->first()->image_path) }}"
                                    class="card-img-top" alt="{{ $produkt->nazov }}">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <p class="card-title">{{ $produkt->name}}<p>
                                <p class="card-text">{{ $produkt->cena }} €</p>
                                <a href="#" class="btn btn-primary mt-auto">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $produkty->links() }}
        </div>
    @else
        <p class="text-center">Žiadne produkty neboli nájdené pre tento výber.</p>
    @endif
@endsection
