<form method="GET" action="{{ route('produkty.zobraz', [$pohlavie, $kategoria]) }}" class="container-produkt mt-5 d-flex flex-wrap gap-3 align-items-center">

    <!-- Zoradenie -->
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Zoradiť podľa
        </button>
        <ul class="dropdown-menu p-3" aria-labelledby="filterDropdown">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sort" id="sortAsc" value="price_asc" {{ request('sort') === 'price_asc' ? 'checked' : '' }}>
                <label class="form-check-label" for="sortAsc">Najnižšia cena</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sort" id="sortDesc" value="price_desc" {{ request('sort') === 'price_desc' ? 'checked' : '' }}>
                <label class="form-check-label" for="sortDesc">Najvyššia cena</label>
            </div>
        </ul>
    </div>

    <!-- Značky -->
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="brandDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Filtrovať podľa značky
        </button>
        <ul class="dropdown-menu p-3" aria-labelledby="brandDropdown">
            @foreach ($brands as $brand)
                <div class="form-check">
                    <input 
                        class="form-check-input" 
                        type="checkbox" 
                        name="brands[]" 
                        value="{{ $brand->nazov }}" 
                        id="brand{{ $brand->id }}"
                        {{ in_array($brand->nazov, request()->input('brands', [])) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="brand{{ $brand->id }}">
                        {{ $brand->nazov }}
                    </label>
                </div>
            @endforeach
        </ul>
    </div>

    <!-- Farby -->
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="colorDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Filtrovať podľa farby
        </button>
        <ul class="dropdown-menu p-3" aria-labelledby="colorDropdown">
            @foreach ($colors as $color)
                <div class="form-check">
                    <input 
                        class="form-check-input" 
                        type="checkbox" 
                        name="colors[]" 
                        value="{{ $color->nazov }}" 
                        id="color{{ $color->id }}"
                        {{ in_array($color->nazov, request()->input('colors', [])) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="color{{ $color->id }}">
                        {{ $color->nazov }}
                    </label>
                </div>
            @endforeach
        </ul>
    </div>

    <!-- Veľkosti -->
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="sizeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Vyberte veľkosť
        </button>
        <ul class="dropdown-menu p-3" aria-labelledby="sizeDropdown">
            @for ($i = 39; $i <= 44; $i++)
                <div class="form-check">
                    <input 
                        class="form-check-input" 
                        type="checkbox" 
                        name="sizes[]" 
                        value="{{ $i }}" 
                        id="size{{ $i }}"
                        {{ in_array($i, request()->input('sizes', [])) ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="size{{ $i }}">{{ $i }}</label>
                </div>
            @endfor
        </ul>
    </div>

    <!-- Cenový rozsah -->
    <div class="d-flex align-items-center gap-2 flex-wrap">
        <input type="number" name="price_from" class="form-control" placeholder="Cena od (€)" style="max-width: 120px;" value="{{ request('price_from') }}">
        <input type="number" name="price_to" class="form-control" placeholder="Cena do (€)" style="max-width: 120px;" value="{{ request('price_to') }}">
    </div>

    <!-- Tlačidlá -->
    <div class="d-flex align-items-center gap-2 ms-auto">
        <button type="submit" class="btn btn-primary">Použiť filtre</button>
        <a href="{{ route('produkty.zobraz', [$pohlavie, $kategoria]) }}" class="btn btn-secondary">Resetovať filtre</a>
    </div>

</form>
