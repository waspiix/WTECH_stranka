@extends('layouts.app')

@section('content')
    @include('partials.navigation')

    <div class="container mt-4">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <input type="text" name="nazov" class="input-style-admin" placeholder="Názov produktu"
                    value="{{ $product->name }}" required>
            </div>

            <div>
                <input type="number" step="0.01" name="cena" class="input-style-admin-cena" placeholder="Cena (€)"
                    value="{{ $product->cena }}" required>
            </div>

            <div class="mt-3 d-flex flex-wrap
                    gap-3">
                <!-- Pohlavie -->
                <select name="pohlavie" class="form-select w-auto" required>
                    <option value="" disabled>Vyberte pohlavie</option>
                    @foreach ($genders as $gender)
                        <option value="{{ $gender->id }}" @if ($gender->id === $product->gender_id) selected @endif>
                            {{ ucfirst($gender->nazov) }}
                        </option>
                    @endforeach
                </select>

                <!-- Kategória -->
                <select name="kategoria" class="form-select w-auto" required>
                    <option value="" disabled>Vyberte kategóriu</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if ($type->id === $product->type_id) selected @endif>
                            {{ ucfirst($type->nazov) }}</option>
                    @endforeach
                </select>


                <select name="znacka" class="form-select w-auto" required>
                    <option value="" disabled>Vyberte značku</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" @if ($brand->id === $product->brand_id) selected @endif>
                            {{ ucfirst($brand->nazov) }}</option>
                    @endforeach
                </select>

                <!-- Farba -->
                <select name="farba" class="form-select w-auto" required>
                    <option value="" disabled>Vyberte farbu</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}" @if ($color->id === $product->color_id) selected @endif>
                            {{ ucfirst($color->nazov) }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Veľkosti od-do -->
            <div class="row mt-3">
                <div class="col">
                    <input type="number" name="velkost_od" class="form-control" placeholder="Veľkosť od"
                        value="{{ $product->velkost_od }}" required>
                </div>
                <div class="col">
                    <input type="number" name="velkost_do" class="form-control" placeholder="Veľkosť do"
                        value="{{ $product->velkost_do }}" required>
                </div>
            </div>

            <!-- Popis -->
            <div class="mt-3">
                <textarea name="popis" class="form-control" rows="3" placeholder="Popis produktu" required>{{ $product->popis }}</textarea>
            </div>

            <!-- Obrázky -->
            <div class="text-center">
                <button type="submit" class="btn btn-success">Aktualizovať</button>
            </div>
        </form>

        <form action="{{ route('admin.image.store', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container mt-4 mb-5">
                <h5 class="mb-3">Nahraj obrázky</h5>
                <input type="file" name="obrazky[]" class="form-control" multiple accept="image/*" required>
                <button type="submit" class="btn btn-success">Nahraj</button>
            </div>
        </form>

        <div class="container row">
            @foreach ($images as $image)
                <div class="card col-6">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="">
                    <div class="card-body">
                        <form action="{{ route('admin.image.delete', $image->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">
                                X
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
