@extends('layouts.app')

@section('content')
    @include('kosik.partials.nav', ['status' => 4])
    <div class="container bg-light p-3 rounded-5">
        <div class="bg-white p-2 rounded-4">
            <div class="row align-items-center">
                <div class="col-12 col-sm-3">
                    <div class="circle_done">
                        <img class="w-100" src="{{ asset('pictures/kosik/check.svg') }}" alt="Done" />
                    </div>
                </div>
                <div class="col-12 col-sm-9">
                    <h2>Objednávka č. {{ $id }} prebehla úspešne.</h2>
                    {{-- <div>Informácie boli zaslané na: email@email.com</div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="container px-4">
        <div class="row gx-5 text-start">
            <div class="col">
                <div class="p-3 text-center">
                    <a href="{{ route('home') }}" type="button" class="btn btn-primary">
                        Hlavná stránka
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
