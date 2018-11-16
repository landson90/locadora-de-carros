<?php

namespace App\Http\Controllers\RendelCar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Http\Requests\Car\CarsFormRequest;
use App\User;

class CarController extends Controller
{
    //
    private $totalPage = 7;
   
    public function __construct()
    {
        $this->middleware('can:mecanico');
    }
    public function index(Car $car, User $user)
    {
        
        $listCar = $car->paginate($this->totalPage);
       
        return view('Car.carList', compact('listCar'));
    }
    
    public function create()
    {
        
        return view('Car.create-edit');
    }
    public function store(CarsFormRequest $request, Car $car)
    {
        $response = $car->getStore($request->all());

        if($response['success']){
            return redirect()
                        ->route('RendelCar.Car-list')
                        ->with('success', $response['message']);
        }
        return redirect()
                    ->back()
                    ->with('error', $response(['message']));

    }
    public function show($id, Car $car)
    {
        $record = $car->find($id);

        return view('Car.carShow', compact('record'));
    }
    public function edit($id, Car $car)
    {
        
        $idCar = $car->find($id);

        return view('Car.create-edit', compact('idCar'));
    }
    public function update($id, Car $car, CarsFormRequest $request)
    {
        $formEdit =  $request->all();

        $edit = $car->find($id);

        $response = $edit->getUpdate($formEdit);
       // return dd($response);
        if($response['success']){
           return  redirect()
                        ->route('RendelCar.Car-list')
                        ->with('success', $response['message']);
        }
        return redirect()
                ->back()
                ->with('error', $response['message']);
    }
   
}
