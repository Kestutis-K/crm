<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\CreateClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('all')) {
            return abort(401);
        }
        $clients = Client::with('user')->get();
        $letters = Client::all(['name'])->map(function(Client $client){
            return strtoupper(substr($client->name, 0, 1));
        })->unique()->sortBy('name');
        return view('clients.index', compact('clients', 'letters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientRequest $request)
    {
        if (! Gate::allows('all')) {
            return abort(401);
        }
        $input = $request->all();
        $user = Auth::id();
        $input['user_id'] = $user;
        if($request->hasFile('photo')) {
            $file = $request->photo;
            $name = time() .".". $file->getClientOriginalExtension();
            $img = Image::make($file)->resize(null, 250, function($constraint) {$constraint->aspectRatio();})->crop(250,250);
            $img->save('images/avatars/'.$name, 99);
            $input['photo'] = $name;
        } else {
            $input['photo'] = 'logo.png';
        }
        Client::create($input);

        return redirect()->route('clients.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchByLetter($letter) {
        $clients = Client::with('user')->where('name', 'LIKE', $letter.'%')->get();
        $letters = Client::all(['name'])->map(function(Client $client){
            return strtoupper(substr($client->name, 0, 1));
        })->unique()->sortBy('name');
        return view('clients.index', compact('clients', 'letters'));
    }
}
