<li class="list-group-item">
    <div class="row" id="item_2">
        <div class="col-12 col-sm-3">
            <img src="../pictures/muzi/Tenisky/nike_airforce.jpg" alt="topanky" class="w-100 rounded-4 mb-2" />
            <div class="input-group flex-nowrap">
                <button onclick="up(2)" class="btn btn-outline-dark">
                    +
                </button>
                <span id="pocet_ks_2" class="text-center form-control"> {{ $pocet }}</span>
                <button onclick="down(2)" class="btn btn-outline-dark">
                    -
                </button>
            </div>
        </div>
        <div class="col-6 col-sm-6 d-flex align-items-center">
            <div>
                <p class="produkt_nazov">{{ $nazov }}</p>
                <label for="velkost_2" class="form-label">Velkosť</label>
                <select class="form-select w-auto" name="velkost topanok" id="velkost_2">
                    <option value="">38</option>
                    <option value="">39</option>
                    <option value="">40</option>
                    <option value="" selected>41</option>
                    <option value="">42</option>
                </select>
            </div>
        </div>
        <div class="col-3 col-sm-2 d-flex align-items-center">
            <p class="cena"><b>{{ $cena }}€</b></p>
        </div>
        <div class="col-3 col-sm-1 d-flex justify-content-end align-items-end align-items-sm-start">
            <button type="remove" onclick="close_span(2)" class="btn btn-danger">
                X
            </button>
        </div>
    </div>
</li>
