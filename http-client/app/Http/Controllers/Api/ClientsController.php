<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientsController extends Controller
{
    public function index(){
        $clients = null;
        $response = Http::get('https://reqres.in/api/users?page=1');
        if($response->successful()) {
            $clients = json_decode($response, true);
            $clients = $clients['data'];
        }
        return view('api.clients.index', ['clients' => $clients]);
    }

    public function show($clientId){
        $response = Http::get('https://reqres.in/api/users/'.$clientId.'?page=1');
        if($response->successful()) {
            $client = json_decode($response, true);
            $client = $client['data'];
        }
        //return $clientId;
        //return $client;
        return view('api.clients.show', ["client" => $client]);
    }

    public function create() {
        return view('api.clients.create');
    }

    public function store(Request $request) {
       $response = Http::post("https://reqres.in/api/users?page=1", [
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'avatar' => "https://reqres.in/img/faces/6-image.jpg"
        ]);
       //return $response;
       return redirect()->route('clients.index');
    }

    public function edit($clientId) {
        $response = Http::get('https://reqres.in/api/users/'.$clientId.'?page=1');
        if($response->successful()) {
            $client = json_decode($response, true);
            $client = $client['data'];
        }
        //return $clientId;
        //return $client;
        return view('api.clients.edit', ["client" => $client]);
    }

    public function update($clientId, Request $request) {
        $response = Http::put('https://reqres.in/api/users/'.$clientId.'?page=1', [
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'avatar' => "https://reqres.in/img/faces/6-image.jpg"
        ]);
        return $response;
        return redirect()->route('clients.index');
    }

    public function destroy($clientId) {
        $response = Http::delete('https://reqres.in/api/users/'.$clientId.'?page=1');
        return $response;

    }

}
