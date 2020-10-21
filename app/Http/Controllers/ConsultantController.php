<?php

namespace App\Http\Controllers;

use App\Consultant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ConsultantController extends Controller
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
        $consultants = Consultant::all();

        $data['consultants'] = $consultants;
        return view('consultants.index',$data);
    }

    public function create()
    {
        return view('consultants.create');
    }

    public function edit($id)
    {
        $consultant = Consultant::findOrFail($id);
        $data['consultant'] = $consultant;
        return view('consultants.edit', $data);
    }


    public function store(Request $request)
    {
        $consultant = new Consultant();

        $consultant->number = $request->number;
        $consultant->first_name = $request->first_name;
        $consultant->last_name = $request->last_name;
        $consultant->address = $request->address;
        $consultant->email = $request->email;
        $consultant->phone = $request->phone;
        $consultant->comments = $request->comments;


        if ($request->hasfile('imageUrl')) {
            $file = $request->file('imageUrl');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('public/uploads/images/', $filename);
            File::delete($consultant->imageUrl);
            $consultant->imageUrl = 'public/uploads/images/' . $filename;
        }
        else{
            $consultant->imageUrl = 'public/uploads/images/default.png';
        }

        $consultant->save();
        return redirect('consultants')->with('Message', 'Consultor creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $consultant = Consultant::findOrFail($id);
        $consultant->number = $request->number;
        $consultant->first_name = $request->first_name;
        $consultant->last_name = $request->last_name;
        $consultant->address = $request->address;
        $consultant->email = $request->email;
        $consultant->phone = $request->phone;
        $consultant->comments = $request->comments;


        if ($request->hasfile('imageUrl')) {
            $file = $request->file('imageUrl');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('public/uploads/images/', $filename);
            File::delete($consultant->imageUrl);
            $consultant->imageUrl = 'public/uploads/images/' . $filename;
        }
        else{
            $consultant->imageUrl = 'public/uploads/images/default.png';
        }

        $consultant->save();
        return redirect('consultants')->with('Message', 'Consultor creado correctamente');
        return view('consultants');
    }

    public function destroy($id)
    {
        Consultant::destroy($id);
        return redirect('consultants')->with('Message', 'Consultor eliminado correctamente');
    }
}
