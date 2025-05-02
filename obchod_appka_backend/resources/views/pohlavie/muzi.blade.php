@extends('layouts.app')

@section('content')
    @include('partials.navigation')

    <article class="nahlad-container">
        <h1 class="text_nadpis">Mužská sekcia</h1>
        <h2 class="text-format">Ponúkame najnovšie výbery produktov, prehliadaj v rámci širokého mužského sortimentu</h2>
    </article>

    @if (is_null($kategoria))
        <div class="pohlavie_obrazky-container">
            <img src="{{ asset('storage/muzi/nahlad/muz.jpg') }}" alt="muz" class="moj-obrazok">
            <img src="{{ asset('storage/muzi/nahlad/muz_topanky2.jpg') }}" alt="topanky" class="obrazok-muz_topanky">
        </div>
    @endif    
    
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
                                <a href="{{ route('produkt.show', $produkt->id) }}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $produkty->appends(request()->query())->links() }}
        </div>
    @else
        <p class="text-center">Žiadne produkty neboli nájdené pre tento výber.</p>
    @endif
@endsection
