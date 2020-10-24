<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
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
        $Companies = Company::all();

        $data['Companies'] = $Companies;
        return view('Companies.index',$data);
    }

    public function create()
    {
        return view('Companies.create');
    }

    public function edit($id)
    {
        $Company = Company::findOrFail($id);
        $data['Company'] = $Company;
        return view('Companies.edit', $data);
    }


    public function store(Request $request)
    {
        $Company = new Company();

        $Company->name = $request->first_name;

        if ($request->hasfile('imageUrl')) {
            $file = $request->file('imageUrl');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('public/uploads/images/', $filename);
            File::delete($Company->imageUrl);
            $Company->imageUrl = 'public/uploads/images/' . $filename;
        }

        $Company->save();
        return redirect('companies')->with('Message', 'Compañía creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $Company = Company::findOrFail($id);
        $Company->name = $request->name;

        if ($request->hasfile('imageUrl')) {
            $file = $request->file('imageUrl');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('public/uploads/images/', $filename);
            File::delete($Company->imageUrl);
            $Company->imageUrl = 'public/uploads/images/' . $filename;
        }
        else{
            $Company->imageUrl = 'public/uploads/images/default.png';
        }

        $Company->save();
        return redirect('companies')->with('Message', 'Compañía creado correctamente');
        return view('companies');
    }

    public function destroy($id)
    {
        Company::destroy($id);
        return redirect('companies')->with('Message', 'Compañía eliminado correctamente');
    }
}
