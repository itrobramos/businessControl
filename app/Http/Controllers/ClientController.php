<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
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
        $Clients = Client::all();

        $data['clients'] = $Clients;
        return view('clients.index',$data);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function edit($id)
    {
        $Client = Client::findOrFail($id);
        $data['client'] = $Client;
        return view('clients.edit', $data);
    }


    public function store(Request $request)
    {
        $Client = new Client();

        $Client->first_name = $request->first_name;
        $Client->last_name = $request->last_name;
        $Client->address = $request->address;
        $Client->email = $request->email;
        $Client->phone = $request->phone;
        $Client->comments = $request->comments;

        if ($request->hasfile('imageUrl')) {
            $file = $request->file('imageUrl');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('public/uploads/images/', $filename);
            File::delete($Client->imageUrl);
            $Client->imageUrl = 'public/uploads/images/' . $filename;
        }
        else{
            $Client->imageUrl = 'public/uploads/images/default.png';
        }

        $Client->save();
        return redirect('clients')->with('Message', 'Cliente creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $Client = Client::findOrFail($id);
        $Client->first_name = $request->first_name;
        $Client->last_name = $request->last_name;
        $Client->address = $request->address;
        $Client->email = $request->email;
        $Client->phone = $request->phone;
        $Client->comments = $request->comments;

        if ($request->hasfile('imageUrl')) {
            $file = $request->file('imageUrl');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('public/uploads/images/', $filename);
            File::delete($Client->imageUrl);
            $Client->imageUrl = 'public/uploads/images/' . $filename;
        }
        else{
            $Client->imageUrl = 'public/uploads/images/default.png';
        }

        $Client->save();
        return redirect('clients')->with('Message', 'Cliente creado correctamente');
        return view('clients');
    }

    public function destroy($id)
    {
        Client::destroy($id);
        return redirect('clients')->with('Message', 'Cliente eliminado correctamente');
    }
}
