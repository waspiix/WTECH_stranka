@extends('layouts.app')

@section('content')
  @include('partials.navigation')  

  <div class="nahlad-container">
    @auth
      @csrf
      <h1 class="text_nadpis">Vitajte {{ Auth::user()->meno }} {{ Auth::user()->priezvisko }} v SneakerHeaders !</h1>
    @else
      <h1 class="text_nadpis">Vitajte v SneakerHeaders !</h1>
    @endauth
    <img src="{{ asset('storage/shoe_store.jpg') }}" alt="shoe store" class="shoe_store-obrazok">
    <h2 class="text-format">Tvojom obľúbenom obchode s topánkami...</h2>  
  </div>

  {{-- Zobrazenie filtrovaných produktov --}}
  @if(isset($produkty))
    <div class="container mt-5">
      <h2 class="text-format mb-3">
        Zobrazuje sa: 
        {{ ucfirst($pohlavie ?? 'všetky') }} / 
        {{ ucfirst($kategoria ?? 'všetky') }}
      </h2>

      <div class="row">
        @forelse ($produkty as $produkt)
          <div class="col-md-3 mb-4">
            <div class="card h-100 shadow">
              <img src="{{ asset('storage/produkty/' . $produkt->image) }}" class="card-img-top" alt="{{ $produkt->nazov }}">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $produkt->nazov }}</h5>
                <p class="card-text">{{ $produkt->cena }} €</p>
                <a href="#" class="btn btn-primary mt-auto">Detail</a>
              </div>
            </div>
          </div>
        @empty
          <p>Žiadne produkty neboli nájdené pre tento výber.</p>
        @endforelse
      </div>
    </div>
  @endif
@endsection
