<nav>
    <div class="container d-flex align-items-center justify-content-between p-3">
        <a href="zoznam.html">
            <div class="circle_no">
                <img src="{{ asset('pictures/kosik/cart.svg') }}" alt="Nakupny kosik" width="50" />
            </div>
        </a>
        <div class="sipka">
            <img src=" {{ asset('pictures/kosik/prava_sipka.svg') }}" alt="sipka" height="40" />
        </div>
        <div class="circle_ok">
            <img src="{{ asset('pictures/kosik/van.svg') }}" alt="Adresa dorucenia" width="50" />
        </div>
        <div class="sipka">
            <img src="{{ asset('pictures/kosik/prava_sipka.svg') }}" alt="sipka" height="40" />
        </div>
        <a href="platba.html">
            <div class="circle_no">
                <img src="{{ asset('pictures/kosik/euro.svg') }}" alt="Platba" width="50" />
            </div>
        </a>
        <div class="sipka">
            <img src="{{ asset('pictures/kosik/prava_sipka.svg') }}" alt="sipka" height="40" />
        </div>
        <a href="done.html">
            <div class="circle_no">
                <img src="{{ asset('pictures/kosik/check.svg') }}" alt="Done" width="50" />
            </div>
        </a>
    </div>
</nav>
