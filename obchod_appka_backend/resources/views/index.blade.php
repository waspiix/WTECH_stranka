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
    <img src="{{ asset('pictures/shoe_store.jpg') }}" alt="shoe store" class="shoe_store-obrazok">
    <h2 class="text-format">Tvojom obľúbenom obchode s topánkami...</h2>  
  </div>
@endsection
