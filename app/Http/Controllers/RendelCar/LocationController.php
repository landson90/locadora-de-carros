<?php

namespace App\Http\Controllers\RendelCar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Car;
use App\Models\Location;

class LocationController extends Controller
{
    //
    private $mony = 150;
    private $totalPage = 7;
    private $status = 0;
    private $close = 0;
    private $location = 1;
    private $locationClose = 0;

   public function __construct()
    {
        $this->middleware('can:ATENDENTE');
    }
    public function create()
    {
        
        return view('location.create');
    }
    public function search(Client $client, Car $car, Request $request)
    {
        //passando status da locacção
        $status  = 1;
        //  passando o valor da locação para o formulário
        $mony = $this->mony;

        //  passando a data para o formulário.
        //  e depois salvado data, no formato certo do banco de dados.
        $day = date('d/m/Y');
        $dayBanco = date('Y/m/d');
        //  informa a data de devolução do carro
        $devolution = date('d/m/Y', strtotime('+7 day'));
        $devolutionBanco = date('Y/m/d', strtotime('+7 day'));
        
        $idClient = $client->getCliente($request->cpf);
        $idCar = $car->getCar($request->placa);
       
        if($idCar == null){
            session()->flash('error', 'Carro indisponível no momento!');
                return redirect('RendelCar/location-create');
        }
        return view('location.create-location', compact('idClient', 'idCar', 'day', 'dayBanco', 'mony', 'devolution', 'devolutionBanco', 'status'));
       
    }
    public function getEffect(Request $request, Location $location, Car $car)
    {
        
        $edit = $car->find($request->car_id);
        $edit->update([
            'status' => $this->location
        ]);        

        $response = $location->getStore($request->all());

        if($response['success']){
            return redirect()
                        ->route('RendelCar.location-list')
                        ->with('success', $response['message']);
        }
        return redirect()
                    ->back()
                    ->with('error', $response(['message']));
    }
    public function getList(Location $location, Client $client, Car $car)
    {   
        
        $clientId = $client->location()->with(['client'])->get();
        $carId = $car->location()->with(['car'])->get();

        $locations = $location->paginate($this->totalPage);
      
        return view('location.location-list', compact('locations'));
       
    }
    public function closeContract($id, Location $location)
    {
        $close = $this->close;
        $location = $location->find($id);
        
        return view('location.CloseContract', compact('location', 'close'));
    }
    public function terminateContract($id, Request $request, Location $location, Car $car)
    {

        $value = $request->all();
        
        $dateForm = $request->delivery;
        
        $response = $location->find($id)->devolution;
        
    
        $day    = substr($response, 0, 2);
        $month  = substr($response, 3, 2);
        $year   = substr($response, 6, 4);

        $dayForm    = substr($dateForm,  -2);
        $monthForm  = substr($dateForm, 5, 2); 
        $yearForm   = substr($dateForm, 0, 4);

        $dateDevolution = mktime(0, 0, 0, $month,$day,$year);
        $dateDelivery   = mktime(0, 0, 0, $monthForm,$dayForm,$yearForm);

        $difference =  $dateDelivery - $dateDevolution;

        $formLocation = $location->find($id);
        
        $edit = $formLocation->getUpdate($value);
        $showDay = $difference/(60*60*24);
        
        if($showDay <= 0){
            $formLocation = $location->find($id);
        
            $edit = $formLocation->getUpdate($value);

            if($edit['success']){
                $editCar = $car->find($request->car_id);
                 $editCar->update([
                            'status' => $this->locationClose
                        ]); 
                return  redirect()
                             ->route('RendelCar.location-list')
                             ->with('success', $edit['message']);
                 
             }
             return redirect()
                     ->back()
                     ->with('error', $edit['message']);
        }
        
        if($showDay > 0){

            $interest = (150 * 30)/100;
            $traffic = ($showDay * $interest)+ 150;

            $formLocation = $location->find($id);
        
            $edit = $formLocation->update([
                'value' => $traffic,
                'status' => 2
            ]);
            $formLocation = $location->find($id);

            $editCar = $car->find($request->car_id);

            $editCar->update([
                    'location' => $this->locationClose]);

                    session()->flash('error', 'Contrato com multa por atraso!');
                    return redirect('RendelCar/location-list');
        }

    }   
    public function showContract($id, Client $client, Car $car, Location $location)
    {
        $clientId = $client->location()->with(['client'])->get();
        $carId = $car->location()->with(['car'])->get();

        $locationId = $location->find($id);
        return view('location.locationShow', compact('locationId'));
    }
    
}
