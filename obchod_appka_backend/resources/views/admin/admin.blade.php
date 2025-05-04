@extends('layouts.app')

@section('content')
    @include('partials.navigation')

    @if(!$kategoria)
        <article class="nahlad-container">
            <h1 class="text_nadpis">Adminova sekcia</h1>
            <h2 class="text-format">Tu môže admin pridávať a upravovať produkty</h2>
        </article>
    @endif

    

    {{-- Dynamické načítanie komponentov --}}
    <div class="container mt-4">
        @if ($kategoria === 'admin-add')
            @include('admin.admin-add')
        @elseif ($kategoria === 'admin-edit')
            @include('admin.admin-edit')
        @else
            <p class="text-center mt-3">Zvoľte jednu z akcií vyššie.</p>
        @endif
    </div>
@endsection