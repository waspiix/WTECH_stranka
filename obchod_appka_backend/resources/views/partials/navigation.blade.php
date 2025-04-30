{{-- Navigácia - pohlavia --}}
<nav class="okienka">
  <a href="{{ route('produkty.zobraz', ['pohlavie' => 'muzi']) }}" class="btn-sm pohlavie-btn">Muži</a>
  <a href="{{ route('produkty.zobraz', ['pohlavie' => 'zeny']) }}" class="btn-sm pohlavie-btn">Ženy</a>
  <a href="{{ route('produkty.zobraz', ['pohlavie' => 'deti']) }}" class="btn-sm pohlavie-btn">Deti</a>
</nav>

<hr class="divider">

{{-- Navigácia - kategórie (iba ak je pohlavie zvolené) --}}
@if(!empty($pohlavie))
  <nav class="okienka">
    <a href="{{ route('produkty.zobraz', [$pohlavie, 'tenisky']) }}" class="btn-sm category-btn">Tenisky</a>
    <a href="{{ route('produkty.zobraz', [$pohlavie, 'formalna']) }}" class="btn-sm category-btn">Formálna</a>
    <a href="{{ route('produkty.zobraz', [$pohlavie, 'outdoor']) }}" class="btn-sm category-btn">Outdoor</a>
    <a href="{{ route('produkty.zobraz', [$pohlavie, 'cizmy']) }}" class="btn-sm category-btn">Čižmy</a>
    <a href="{{ route('produkty.zobraz', [$pohlavie, 'letna']) }}" class="btn-sm category-btn">Letná</a>
  </nav>
@endif
