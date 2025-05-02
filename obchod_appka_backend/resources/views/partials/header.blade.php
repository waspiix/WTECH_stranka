<a href="{{ route('home') }}" class="shopHeader-link">
    <div class="shopHeader">SneakerHeaders</div>
</a>

<form method="GET" action="{{ route('produkty.search') }}" class="search-container position-relative" autocomplete="off">
    <input type="text" id="search-input" name="query" placeholder="Vyhľadaj produkt...">
    <button type="submit" id="search-btn">Hľadať</button>
    <ul id="autocomplete-results" class="autocomplete-list"></ul>
</form>

<div class="header-right">
    <button class="cart-btn" onclick="window.location.href='{{ route('kosik.index') }}'"><i
            class="fas fa-shopping-cart"></i></button>
    @auth
        @csrf
        <button class="profile-btn" onclick="window.location.href='{{ route('profile') }}'">
            {{ Auth::user()->meno }} {{ Auth::user()->priezvisko }}
        </button>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="profile-btn border-0">Odhlásiť</button>
        </form>
    @else
        <button class="profile-btn" onclick="window.location.href='{{ route('login') }}'">Prihlásenie</button>
    @endauth
</div>
