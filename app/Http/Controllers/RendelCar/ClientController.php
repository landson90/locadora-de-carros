<?php

namespace App\Http\Controllers\RendelCar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Http\Requests\Client\ClientsFormRequest;

class ClientController extends Controller
{
    //
    private $totalPage = 7;

    public function __construct()
    {
        $this->middleware('can:ATENDENTE');
    }
    public function create()
    {
        return view('Client.create-edit');
    }
    public function index(Client $client)
    {
        $listClient = $client->paginate($this->totalPage);

        return view('Client.ListClient', compact('listClient'));
    }
    public function store(ClientsFormRequest $request, Client $client)
    {
    
        $response = $client->getStore($request->all());

        if($response['success']){
            return redirect()
                        ->route('RendelCar.clientes')
                        ->with('success', $response['message']);
        }
        return redirect()
                    ->back()
                    ->with('error', $response(['message']));

    }
    public function show($id, Client $client)
    {
       $record = $client->find($id);
        
       return view('Client.show', compact('record'));
    }
    public function edit($id, Client $client)
    {
        $edit = $client->find($id);
      // return dd($edit);
       return view ('Client.create-edit', compact('edit'));
    }
    public function update($id, Client $client, ClientsFormRequest $request)
    {
        $formEdit =  $request->all();

        $edit = $client->find($id);

        $response = $edit->getUpdate($formEdit);
       // return dd($response);
        if($response['success']){
           return  redirect()
                        ->route('RendelCar.clientes')
                        ->with('success', $response['message']);
        }
        return redirect()
                ->back()
                ->with('error', $response['message']);
    }
}
