<h1 class="text_nadpis">Pridanie produktu</h1>

<form action="{{ route('admin.produkt.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <input type="text" name="nazov" class="input-style-admin" placeholder="Názov produktu" required>
    </div>

    <div>
        <input type="number" step="0.01" name="cena" class="input-style-admin-cena" placeholder="Cena (€)"
            required>
    </div>

    <div class="mt-3 d-flex flex-wrap gap-3">
        <!-- Pohlavie -->
        <select name="pohlavie" class="form-select w-auto" required>
            <option value="" disabled selected>Vyberte pohlavie</option>
            @foreach ($genders as $gender)
                <option value="{{ $gender->nazov }}">{{ ucfirst($gender->nazov) }}</option>
            @endforeach
        </select>

        <!-- Kategória -->
        <select name="kategoria" class="form-select w-auto" required>
            <option value="" disabled selected>Vyberte kategóriu</option>
            @foreach ($types as $type)
                <option value="{{ $type->nazov }}">{{ ucfirst($type->nazov) }}</option>
            @endforeach
        </select>

        <select name="znacka" class="form-select w-auto" required>
            <option value="" disabled selected>Vyberte značku</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->nazov }}">{{ ucfirst($brand->nazov) }}</option>
            @endforeach
        </select>

        <!-- Farba -->
        <select name="farba" class="form-select w-auto" required>
            <option value="" disabled selected>Vyberte farbu</option>
            @foreach ($colors as $color)
                <option value="{{ $color->nazov }}">{{ ucfirst($color->nazov) }}</option>
            @endforeach
        </select>
    </div>

    <!-- Veľkosti od-do -->
    <div class="row mt-3">
        <div class="col">
            <input type="number" name="velkost_od" class="form-control" placeholder="Veľkosť od" required>
        </div>
        <div class="col">
            <input type="number" name="velkost_do" class="form-control" placeholder="Veľkosť do" required>
        </div>
    </div>

    <!-- Popis -->
    <div class="mt-3">
        <textarea name="popis" class="form-control" rows="3" placeholder="Popis produktu" required></textarea>
    </div>

    <!-- Obrázky -->
    <div class="container mt-4 mb-5">
        <h5 class="mb-3">Nahraj 2 obrázky</h5>
        <input type="file" name="obrazky[]" class="form-control" multiple accept="image/*" required>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-success">Pridať produkt</button>
    </div>
</form>
