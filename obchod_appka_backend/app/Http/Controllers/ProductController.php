<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkt;
use App\Models\Pohlavie;
use App\Models\Druh;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Color;

class ProductController extends Controller
{

    public function show($id)
    {
        $produkt = Product::with('image')->findOrFail($id);
        return view('produkt.produkt', compact('produkt'));
    }

    // pre search-bar
    public function autocomplete(Request $request)
    {
        $query = $request->get('query');

        $produkty = Product::where('name', 'LIKE', '%' . $query . '%')
            ->limit(10)
            ->get(['id', 'name']);

        return response()->json($produkty);
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
    
        $produkty = Product::where('name', 'like', "%$query%")
            ->with('image')
            ->get();
    
        return view('produkt.produkt', compact('produkt'));
    }

    // na filtrovanie produktov v pohlaviach, katergoriach
    // a takisto filtroch ako farba, znacka, cena...
    public function zobraz($pohlavie, $kategoria = null)
    {
        $query = Product::query();
    
        if ($kategoria) {
            $query->whereHas('type', function ($q) use ($kategoria) {
                $q->where('nazov', $kategoria);
            });
        }
    
        $query->whereHas('gender', function ($q) use ($pohlavie) {
            $q->where('nazov', $pohlavie);
        });
    
        $request = request();
    
        // Filter: Značky (viacnásobný výber)
        if ($request->filled('brands')) {
            $query->whereHas('brand', function ($q) use ($request) {
                $q->whereIn('nazov', $request->input('brands'));
            });
        }
    
        // Filter: Farby (viacnásobný výber)
        if ($request->filled('colors')) {
            $query->whereHas('color', function ($q) use ($request) {
                $q->whereIn('nazov', $request->input('colors'));
            });
        }
    
        // Filter: Veľkosti (viacnásobný výber)
        // Filter: Veľkosti (viacnásobný výber)
        if ($request->filled('sizes')) {
            $query->where(function ($q) use ($request) {
                foreach ($request->input('sizes') as $size) {
                    $q->orWhere(function ($subQ) use ($size) {
                        $subQ->where('velkost_od', '<=', $size)
                            ->where('velkost_do', '>=', $size);
                    });
                }
            });
        }
    
        // Filter: Cena od / do
        if ($request->filled('price_from')) {
            $query->where('cena', '>=', $request->input('price_from'));
        }
    
        if ($request->filled('price_to')) {
            $query->where('cena', '<=', $request->input('price_to'));
        }
    
        // Zoradenie podľa ceny
        if ($request->filled('sort')) {
            $sort = $request->input('sort');
            if ($sort === 'price_asc') {
                $query->orderBy('cena', 'asc');
            } elseif ($sort === 'price_desc') {
                $query->orderBy('cena', 'desc');
            }
        }
    
        $produkty = $query->paginate(8);
    
        // Pre dropdowny s filtrami
        $brands = Brand::select('nazov')->distinct()->orderBy('nazov')->get();
        $colors = Color::select('nazov')->distinct()->orderBy('nazov')->get();
    
        $viewPath = 'pohlavie.' . $pohlavie;
    
        if (!view()->exists($viewPath)) {
            abort(404, 'Pohlavie view neexistuje');
        }
    
        return view($viewPath, [
            'produkty' => $produkty,
            'pohlavie' => $pohlavie,
            'kategoria' => $kategoria,
            'brands' => $brands,
            'colors' => $colors,
        ]);
    }
    
    
    
}
