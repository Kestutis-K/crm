<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class SearchController extends Controller
{


    public function searchClient(Request $request) {
        $input = $request->all();
        $clients = Client::search($input['query'])->get();
        //$clients = json_decode($request->getContent(), true);
        //dd();
        $letters = Client::all(['name'])->map(function(Client $client){
            return strtoupper(substr($client->name, 0, 1));
        })->unique()->sortBy('name');
        return view('clients.index', compact('clients', 'letters'));
    }

}


