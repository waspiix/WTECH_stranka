@extends('layouts.app')

@section('content')
  @include('partials.navigation')

  <article class="nahlad-container">
    <h1 class="text_nadpis">Mužská sekcia</h1>
    <h2 class="text-format">Ponúkame najnovšie výbery produktov, prehliadaj v rámci širokého mužského sortimentu</h2>  
  </article>

  <div class="pohlavie_obrazky-container">
    <img src="{{ asset('storage/muzi/nahlad/muz.jpg') }}" alt="muz" class="moj-obrazok">
    <img src="{{ asset('storage/muzi/nahlad/muz_topanky2.jpg') }}" alt="topanky" class="obrazok-muz_topanky">
  </div>

  @if(isset($produkty) && $produkty->count())
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
            @if($produkt->images->isNotEmpty())
              <img src="{{ asset('storage/' . $produkt->images->first()->image_path) }}" class="card-img-top" alt="{{ $produkt->nazov }}">
            @endif
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $produkt->nazov }}</h5>
                <p class="card-text">{{ $produkt->cena }} €</p>
                <a href="#" class="btn btn-primary mt-auto">Detail</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="d-flex justify-content-center mt-4">
        {{ $produkty->links() }}
      </div>
    </div>
  @else
    <p class="text-center">Žiadne produkty neboli nájdené pre tento výber.</p>
  @endif
@endsection
