{{-- Navigácia - pohlavia --}}
<nav class="okienka">
  <a href="{{ route('produkty.zobraz', ['pohlavie' => 'muzi']) }}" class="btn-sm pohlavie-btn">Muži</a>
  <a href="{{ route('produkty.zobraz', ['pohlavie' => 'zeny']) }}" class="btn-sm pohlavie-btn">Ženy</a>
  <a href="{{ route('produkty.zobraz', ['pohlavie' => 'deti']) }}" class="btn-sm pohlavie-btn">Deti</a>
  @auth
    @if (auth()->user()->admin)
      <a href="{{ route('produkty.zobraz', ['pohlavie' => 'admin']) }}" class="btn-sm pohlavie-btn text-bg-danger">ADMIN</a>
    @endif
  @endauth
</nav>

<hr class="divider">

{{-- Navigácia - kategórie --}}
@if (!empty($pohlavie))
  <nav class="okienka">
    
    @if ($pohlavie === 'admin' && auth()->user()->admin)
      <a href="{{ route('produkty.zobraz', [$pohlavie, 'admin-add']) }}" class="btn-sm category-btn text-bg-success">Admin Pridaj</a>
      <a href="{{ route('produkty.zobraz', [$pohlavie, 'admin-edit']) }}" class="btn-sm category-btn text-bg-danger">Admin Uprav</a>
    @else
      <a href="{{ route('produkty.zobraz', [$pohlavie, 'tenisky']) }}" class="btn-sm category-btn">Tenisky</a>
      <a href="{{ route('produkty.zobraz', [$pohlavie, 'formalna']) }}" class="btn-sm category-btn">Formálna</a>
      <a href="{{ route('produkty.zobraz', [$pohlavie, 'outdoor']) }}" class="btn-sm category-btn">Outdoor</a>
      <a href="{{ route('produkty.zobraz', [$pohlavie, 'cizmy']) }}" class="btn-sm category-btn">Čižmy</a>
      <a href="{{ route('produkty.zobraz', [$pohlavie, 'letna']) }}" class="btn-sm category-btn">Letná</a>
    @endif
    
  </nav>
@endif
