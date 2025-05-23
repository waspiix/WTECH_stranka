<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkt;
use App\Models\Gender;
use App\Models\Druh;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Type;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

        if ($pohlavie === 'admin' && Auth::check() && Auth::user()->admin) {
            // odovzdava existujuce farby a znacky ked admin pridava v add
            $products = [];
            $genders = Gender::select('nazov')->distinct()->orderBy('nazov')->get();
            $types = Type::select('nazov')->distinct()->orderBy('nazov')->get();
            $brands = Brand::select('nazov')->distinct()->orderBy('nazov')->get();
            $colors = Color::select('nazov')->distinct()->orderBy('nazov')->get();

            if ($kategoria === "admin-edit") {
                $products = Product::with(['brand', 'type', 'gender'])->get();
            }

            return view('admin.admin', [
                'pohlavie' => $pohlavie,
                'kategoria' => $kategoria,
                'genders' => $genders,
                'types' => $types,
                'brands' => $brands,
                'colors' => $colors,
                'products' => $products,
            ]);
        }

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

    public function storeImage($id, Request $request)
    {

        $request->validate([
            'obrazky.*' => 'image|max:2048',
        ]);


        $produkt = Product::findOrFail($id);

        if ($request->hasFile('obrazky')) {
            foreach ($request->file('obrazky') as $obrazok) {
                $path = $obrazok->store('produkty', 'public');
                $produkt->image()->create(['image_path' => $path]);
            }
        }

        return redirect()->back();
    }

    public function deleteImage($id)
    {
        $image =  Image::find($id);

        $product_id = $image->product_id;

        $path = storage_path('app/public/' . $image->image_path);
        if (File::exists($path)) {
            File::delete($path);
        }

        $image->delete();

        return redirect('/admin/produkt/' . $product_id);
    }

    public function delete($id)
    {
        abort_unless(Auth::user()->admin, 403);

        $images = Product::findOrFail($id)->image()->get();

        foreach ($images as $image) {
            $path = storage_path('app/public/' . $image->image_path);
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back();
    }

    public function update($id, Request $request)
    {
        abort_unless(Auth::user()->admin, 403);

        $product = Product::findOrFail($id);

        $request->validate([
            'nazov' => 'required|string|max:255',
            'cena' => 'required|numeric|min:0',
            'pohlavie' => 'required',
            'kategoria' => 'required',
            'farba' => 'required',
            'znacka' => 'required',
            'velkost_od' => 'required|numeric',
            'velkost_do' => 'required|numeric|gte:velkost_od',
            'popis' => 'required|string',
        ]);

        $product->update([
            'name' => $request->nazov,
            'cena' => $request->cena,
            'gender_id' => $request->pohlavie,
            'type_id' => $request->kategoria,
            'brand_id' => $request->znacka,
            'color_id' => $request->farba,
            'popis' => $request->popis,
            'velkost_od' => $request->velkost_od,
            'velkost_do' => $request->velkost_do,
        ]);

        return redirect()->back();
    }

    public function edit($id)
    {
        abort_unless(Auth::user()->admin, 403);

        $product = Product::find($id);
        $images = $product->image()->get();

        $genders = Gender::all();
        $types = Type::all();;
        $brands = Brand::all();;
        $colors = Color::all();;


        return view('admin.product-edit', [
            'genders' => $genders,
            'types' => $types,
            'brands' => $brands,
            'colors' => $colors,
            'product' => $product,
            'images' => $images,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nazov' => 'required|string|max:255',
            'cena' => 'required|numeric|min:0',
            'pohlavie' => 'required|string|in:muzi,zeny,deti',
            'kategoria' => 'required|string',
            'farba' => 'required|string',
            'znacka' => 'required|string',
            'velkost_od' => 'required|numeric',
            'velkost_do' => 'required|numeric|gte:velkost_od',
            'popis' => 'required|string',
            'obrazky.*' => 'image|max:2048',
        ]);

        $produkt = Product::create([
            'name' => $request->nazov,
            'cena' => $request->cena,
            'velkost_od' => $request->velkost_od,
            'velkost_do' => $request->velkost_do,
            'popis' => $request->popis,
        ]);

        $produkt->gender()->associate(Gender::where('nazov', $request->pohlavie)->first());
        $produkt->type()->associate(Type::where('nazov', $request->kategoria)->first());
        $produkt->color()->associate(Color::where('nazov', $request->farba)->first());
        $produkt->brand()->associate(Brand::where('nazov', $request->znacka)->first());
        $produkt->save();

        if ($request->hasFile('obrazky')) {
            foreach ($request->file('obrazky') as $obrazok) {
                $path = $obrazok->store('produkty', 'public');
                $produkt->image()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('produkty.zobraz', ['pohlavie' => 'admin', 'kategoria' => 'add'])
            ->with('success', 'Produkt bol úspešne pridaný.');
    }
}
