
<a href="{{ route('home') }}" class="shopHeader-link">
<div class="shopHeader">SneakerHeaders</div>
</a>

<div class="search-container">
<input type="text" id="search-input" placeholder="Vyhľadaj produkt...">
<button type="submit" id="search-btn">Hľadať</button>
</div>

<div class="header-right">
<button class="cart-btn"><i class="fas fa-shopping-cart"></i></button>
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

