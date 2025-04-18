@extends('layouts.app')

@section('content')
  @include('partials.navigation')  
  <div class="nahlad-container">
    <h1 class="text_nadpis">Vitajte v SneakerHeaders !</h1>
    <img src="{{ asset('pictures/shoe_store.jpg') }}" alt="shoe store" class="shoe_store-obrazok">
    <h2 class="text-format">Tvojom obľúbenom obchode s topánkami...</h2>  
  </div>
@endsection