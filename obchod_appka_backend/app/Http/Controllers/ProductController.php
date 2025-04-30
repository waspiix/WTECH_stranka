<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkt;
use App\Models\Pohlavie;
use App\Models\Druh;

class ProductController extends Controller
{
    public function zobraz($pohlavie, $kategoria = null)
    {
        $query = Produkt::query();
    
        // Ak je zvolená kategória (napr. 'tenisky', 'cizmy' atď.)
        if ($kategoria) {
            $query->whereHas('druh', function ($q) use ($kategoria) {
                $q->where('nazov', $kategoria);
            });
        }
    
        // Ak chceš filtrovať aj podľa pohlavia (napr. muzi, zeny)
        $query->whereHas('pohlavie', function ($q) use ($pohlavie) {
            $q->where('nazov', $pohlavie);
        });
    
        $produkty = $query->get();
    
        $viewPath = 'pohlavie.' . $pohlavie;
    
        if (!view()->exists($viewPath)) {
            abort(404, 'Pohlavie view neexistuje');
        }
    
        return view($viewPath, [
            'produkty' => $produkty,
            'pohlavie' => $pohlavie,
            'kategoria' => $kategoria
        ]);
    }
    
}
