<?php

namespace App\Http\Controllers;

use App\Client;
use App\Comment;
use App\Http\Requests\CreateClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
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
        if (! Gate::allows('all')) {
            return abort(401);
        }
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
        if (! Gate::allows('all')) {
            return abort(401);
        }
        $client = Client::with('comment')->findOrFail($id);
        $profile = Client::find($id)->profile()->first();
        //return $profile;
        return view('clients.show', compact('client', 'profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('all')) {
            return abort(401);
        }
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));

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
        if (! Gate::allows('all')) {
            return abort(401);
        }
        $client = Client::findOrFail($id);
        $input = $request->all();
        if($request->hasFile('photo')) {
            if(file_exists(public_path().'/images/avatars/'.$client->photo)) {
                if($client->photo != 'logo.png') {
                    unlink(public_path().'/images/avatars/'.$client->photo);} }
            $file = $request->file('photo');
            $name = time() .".". $file->getClientOriginalExtension();
            $img = Image::make($file)->resize(null, 250, function($constraint) {$constraint->aspectRatio();});
            $img->save('images/avatars/'.$name, 99);
            $input['photo'] = $name;
            session()->flash('flash_blue', 'Kliento duomenys atnaujinti!');
            $client->update($input);
            return back();
        } else {
            $client->update($input);
            session()->flash('flash_blue', 'Kliento duomenys atnaujinti!');
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('all')) {
            return abort(401);
        }
        $client = Client::findOrFail($id);
        if($client->photo != 'logo.png') {
            unlink(public_path().'/images/avatars/'.$client->photo);
        }
        session()->flash('flash_red', 'Klientas '. $client->name .' ištrintas!');
        $client->delete();
        return redirect()->route('clients.index');
    }

    public function searchByLetter($letter) {
        if (! Gate::allows('all')) {
            return abort(401);
        }
        $clients = Client::with('user')->where('name', 'LIKE', $letter.'%')->get();
        $letters = Client::all(['name'])->map(function(Client $client){
            return strtoupper(substr($client->name, 0, 1));
        })->unique()->sortBy('name');
        return view('clients.index', compact('clients', 'letters'));
    }

    //-------------------------------------------
    //---------- For Select2 search: Start ----------
    //-------------------------------------------
    public function info($id) {
        $client = Client::findOrFail($id);
        //$client[] = ['id'=>$client->id, 'name'=>$client->name, 'comp_id'=>$client->comp_id];
        return Response::json($client);
    }

    public function findClient(Request $request)
    {
        $term = $request->q;
        if (empty($term)) {
            return Response::json([]);
        }
        $clients = Client::search($term)->get();
        $found_clients = [];
        foreach ($clients as $client) {
            $found_clients[] = [
                'id'=>$client->id,
                'text'=>$client->name,
                'type'=>$client->type,
                'name'=>$client->name,
                'vip'=>$client->vip,
                'note'=>$client->note,
                'comp_id'=>$client->comp_id,
                'comp_vat'=>$client->comp_vat,
                'comp_phone'=>$client->phone,
                'email'=>$client->email,
                'address'=>$client->address,
                'city'=>$client->city,
                'country'=>$client->country,
                'postcode'=>$client->postcode,
                'photo'=>$client->photo,
            ];
        }
        return Response::json($found_clients);
    }
    //-------------------------------------------
    //---------- For Select2 search: Start ----------
    //-------------------------------------------

}
