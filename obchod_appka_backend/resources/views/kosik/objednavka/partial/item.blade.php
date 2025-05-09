<li class="list-group-item">
    <div class="row align-items-center text-center">
        <div class="col-12 col-sm-3">
            <img src="{{ asset('storage/' . ($item->image->first()?->image_path ?? 'def.jpg')) }}"
                alt="{{ $name }}" class="w-75 rounded-2" />
        </div>
        <div class="col-12 col-sm-3">
            <div class="produkt_suhrn">{{ $name }}</div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="produkt_suhrn">{{ $item->pivot->velkost }}</div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="produkt_suhrn">{{ $cena * $item->pivot->pocet }}€</div>
        </div>
    </div>
</li>
