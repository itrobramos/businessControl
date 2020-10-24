<?php

namespace App\Http\Controllers;

use App\Company;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        date_default_timezone_set('America/Monterrey');
        $Products = Product::all();

        $data['products'] = $Products;
        return view('products.index',$data);
    }

    public function create()
    {
        date_default_timezone_set('America/Monterrey');
        $Companies = Company::all();

        $data['companies'] = $Companies;
        return view('products.create', $data);
    }

    public function edit($id)
    {
        $Product = Product::findOrFail($id);
        $Companies = Company::all();

        $data['product'] = $Product;
        $data['companies'] = $Companies;

        return view('products.edit', $data);
    }


    public function store(Request $request)
    {
        $Product = new Product();

        $Product->sku = $request->sku;
        $Product->name = $request->name;
        $Product->price = $request->price;
        $Product->companyId = $request->companyId;

        if ($request->hasfile('imageUrl')) {
            $file = $request->file('imageUrl');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('public/uploads/images/', $filename);
            File::delete($Product->imageUrl);
            $Product->imageUrl = 'public/uploads/images/' . $filename;
        }
        else{
            $Product->imageUrl = 'public/uploads/images/default.png';
        }

        $Product->save();
        return redirect('products')->with('Message', 'Producto creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $Product = Product::findOrFail($id);
        $Product->sku = $request->sku;
        $Product->name = $request->name;
        $Product->price = $request->price;
        $Product->companyId = $request->companyId;

        if ($request->hasfile('imageUrl')) {
            $file = $request->file('imageUrl');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('public/uploads/images/', $filename);
            File::delete($Product->imageUrl);
            $Product->imageUrl = 'public/uploads/images/' . $filename;
        }

        $Product->save();
        return redirect('products')->with('Message', 'Producto creado correctamente');
        return view('products');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('products')->with('Message', 'Producto eliminado correctamente');
    }
}
