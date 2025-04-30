@extends('layouts.app')

@section('content')
    @include('partials.navigation')
    <!-- Späť -->
    <button class="text-format back-button mt-4 mb-4" onclick="window.history.back()">&lt; Späť</button>
    <div class="container mb-4 mt-4">
        

        <div class="row g-4 show_product-container">
            <!-- Obrázok 1 -->
            @if ($produkt->image->count() > 0)
                <div class="col-12 col-md-4">
                    <img src="{{ asset('storage/' . $produkt->image[0]->image_path) }}"
                         alt="{{ $produkt->name }}"
                         class="img-fluid obrazok-show-produkt">
                </div>
            @endif

            <!-- Obrázok 2 -->
            @if ($produkt->image->count() > 1)
                <div class="col-12 col-md-4">
                    <img src="{{ asset('storage/' . $produkt->image[1]->image_path) }}"
                         alt="{{ $produkt->name }} 2"
                         class="img-fluid obrazok-show-produkt">
                </div>
            @endif

            <!-- Informácie o produkte -->
            <div class="col-12 col-md-4 d-flex flex-column popis-produktu-nahlad">
                <h2 class="text_nadpis">{{ $produkt->name }}</h2>
                <h4 class="mb-3">{{ $produkt->cena }} €</h4>

                <!-- (Neaktívne) Veľkosti -->
                <div class="dropdown mt-3">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Vyberte veľkosť
                    </button>
                    <ul class="dropdown-menu">
                        @for ($i = $produkt->velkost_od; $i <= $produkt->velkost_do; $i++)
                            <li><a class="dropdown-item" href="#">{{ $i }}</a></li>
                        @endfor
                    </ul>
                </div>

                <!-- (Neaktívne) Množstvo -->
                <div class="d-flex align-items-center mt-3">
                    <button class="btn btn-outline-secondary" id="decrease">-</button>
                    <input type="number" id="quantity" value="1" min="1"
                           class="form-control text-center mx-2" style="width: 50px;">
                    <button class="btn btn-outline-secondary" id="increase">+</button>
                </div>

                <!-- Tlačidlo (nefunkčné zatiaľ) -->
                <button class="btn btn-success mt-3">Pridať do košíka</button>

                <!-- Popis -->
                <p class="mt-4 text-format">{{ $produkt->popis }}</p>
            </div>
        </div>
    </div>

    <!-- Skript na úpravu množstva -->
    <script>
        const decreaseBtn = document.getElementById('decrease');
        const increaseBtn = document.getElementById('increase');
        const quantityInput = document.getElementById('quantity');

        decreaseBtn?.addEventListener('click', () => {
            let val = parseInt(quantityInput.value);
            if (val > 1) quantityInput.value = val - 1;
        });

        increaseBtn?.addEventListener('click', () => {
            let val = parseInt(quantityInput.value);
            quantityInput.value = val + 1;
        });
    </script>
@endsection
