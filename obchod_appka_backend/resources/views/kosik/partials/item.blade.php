<li class="list-group-item">
    <div class="row" id="item_2">
        <div class="col-12 col-sm-3">
            <img src=" {{ asset('storage/' . ($item->image->first()?->image_path ?? 'def.jpg')) }}" alt="topanky"
                class="w-100 rounded-4 mb-2" />
            <form action="{{ route('kosik.update', $item->pivot->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="input-group flex-nowrap">
                    <button type="submit" name="action" value="dec" class="btn btn-outline-dark">
                        -
                    </button>
                    <span id="pocet_ks" class="text-center form-control"> {{ $item->pivot->pocet }}</span>
                    <button type="submit" name="action" value="inc" class="btn btn-outline-dark">
                        +
                    </button>
                </div>
            </form>
        </div>
        <div class="col-6 col-sm-6 d-flex align-items-center">
            <div>
                <p class="produkt_nazov">{{ $name }}</p>
                {{-- <label for="velkost_2" class="form-label">Velkosť</label> --}}
                <p>{{ $item->pivot->velkost }}</p>
            </div>
        </div>
        <div class="col-3 col-sm-2 d-flex align-items-center">
            <p class="cena"><b>{{ $cena * $item->pivot->pocet }}€</b></p>
        </div>
        <div class="col-3 col-sm-1 d-flex justify-content-end align-items-end align-items-sm-start">
            <form action="{{ route('kosik.destroy', $item->pivot->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    X
                </button>
            </form>
        </div>
    </div>
</li>
