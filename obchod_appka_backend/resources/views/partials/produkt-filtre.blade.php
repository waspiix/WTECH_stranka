<div class="container-produkt mt-5 d-flex flex-wrap gap-3 align-items-center">
    <!-- Zoradenie -->
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Zoradiť podľa
        </button>
        <ul class="dropdown-menu" aria-labelledby="filterDropdown">
            <li><a class="dropdown-item" href="#">Najnižšia cena</a></li>
            <li><a class="dropdown-item" href="#">Najvyššia cena</a></li>
            <li><a class="dropdown-item" href="#">Najpredávanejšie</a></li>
            <li><a class="dropdown-item" href="#">Najväčšia zľava</a></li>
        </ul>
    </div>

    <!-- Značky -->
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="brandDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Filtrovať podľa značky
        </button>
        <ul class="dropdown-menu" aria-labelledby="brandDropdown">
            <li><a class="dropdown-item" href="#">Nike</a></li>
            <li><a class="dropdown-item" href="#">Adidas</a></li>
            <li><a class="dropdown-item" href="#">Puma</a></li>
            <li><a class="dropdown-item" href="#">Reebok</a></li>
        </ul>
    </div>

    <!-- Farby -->
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="colorDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Filtrovať podľa farby
        </button>
        <ul class="dropdown-menu" aria-labelledby="colorDropdown">
            <li><a class="dropdown-item" href="#">Červená</a></li>
            <li><a class="dropdown-item" href="#">Modrá</a></li>
            <li><a class="dropdown-item" href="#">Čierna</a></li>
            <li><a class="dropdown-item" href="#">Biela</a></li>
        </ul>
    </div>

    <!-- Veľkosti -->
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="sizeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Vyberte veľkosť
        </button>
        <ul class="dropdown-menu p-3">
            @for ($i = 39; $i <= 44; $i++)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="size{{ $i }}">
                    <label class="form-check-label" for="size{{ $i }}">{{ $i }}</label>
                </div>
            @endfor
        </ul>
    </div>

    <!-- Cenový rozsah -->
    <div class="d-flex align-items-center gap-2 flex-wrap">
        <input type="number" class="form-control" placeholder="Cena od (€)" style="max-width: 120px;">
        <input type="number" class="form-control" placeholder="Cena do (€)" style="max-width: 120px;">
    </div>

    <!-- Tlačidlá -->
    <div class="d-flex align-items-center gap-2 ms-auto">
        <button class="btn btn-primary">Použiť filtre</button>
        <button class="btn btn-secondary">Resetovať filtre</button>
    </div>
</div>
