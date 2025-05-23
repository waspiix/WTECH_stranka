<div class="container d-flex align-items-center justify-content-between p-3">
    <div class="circle{{ $status === 1 ? '_ok' : '' }}">
        <img src="{{ asset('pictures/kosik/cart.svg') }}" alt="Nakupny kosik" width="50" />
    </div>
    <div class="sipka">
        <img src=" {{ asset('pictures/kosik/prava_sipka.svg') }}" alt="sipka" height="40" />
    </div>
    <div class="circle{{ $status === 2 ? '_ok' : '' }}">
        <img src="{{ asset('pictures/kosik/van.svg') }}" alt="Adresa dorucenia" width="50" />
    </div>
    <div class="sipka">
        <img src="{{ asset('pictures/kosik/prava_sipka.svg') }}" alt="sipka" height="40" />
    </div>
    <div class="circle{{ $status === 3 ? '_ok' : '' }}">
        <img src="{{ asset('pictures/kosik/euro.svg') }}" alt="Platba" width="50" />
    </div>
    <div class="sipka">
        <img src="{{ asset('pictures/kosik/prava_sipka.svg') }}" alt="sipka" height="40" />
    </div>
    <div class="circle{{ $status === 4 ? '_ok' : '' }}">
        <img src="{{ asset('pictures/kosik/check.svg') }}" alt="Done" width="50" />
    </div>
</div>
