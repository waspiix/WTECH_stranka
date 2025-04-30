<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkt;
use App\Models\Pohlavie;
use App\Models\Druh;
use App\Models\Product;

class ProductController extends Controller
{
    public function zobraz($pohlavie, $kategoria = null)
    {
        $query = Product::query();

        // Ak je zvolená kategória (napr. 'tenisky', 'cizmy' atď.)
        if ($kategoria) {
            $query->whereHas('type', function ($q) use ($kategoria) {
                $q->where('nazov', $kategoria);
            });
        }

        // Ak chceš filtrovať aj podľa pohlavia (napr. muzi, zeny)
        $query->whereHas('gender', function ($q) use ($pohlavie) {
            $q->where('nazov', $pohlavie);
        });
<<<<<<< HEAD
    
        $produkty = $query->paginate(8);
    
=======

        $produkty = $query->get();

>>>>>>> c85d66dc1282e64cda65347650aff31d1728129a
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
