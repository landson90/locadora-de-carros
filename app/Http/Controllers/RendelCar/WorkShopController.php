<?php

namespace App\Http\Controllers\RendelCar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\WorkShop;
use App\User;
use Gate;

class WorkShopController extends Controller
{
    //
    private $carStatus = 2;
    private $carExit = 0;
    private $workShop = 1;
    private $shopStatus = 2;
    private $totalPage = 7;

    public function index(WorkShop $workshop, User $user)
    {
        

        $listShop = $workshop->paginate($this->totalPage);
       
        return view('WorkShop.workshop-list', compact('listShop'));
    }

    public function create($id, Car $car, User $user)
    {
       $users = auth()->user()->id;
        
        $car = $car->find($id);
        $carId = $car->id;
        $status = $this->workShop;
        return view('WorkShop.create-edit', compact('carId', 'status', 'users'));
    }
    public function store(WorkShop $workshop, Request $request, Car $car)
    {
        $create = $request->all();
        //
        $carStatus = $car->find($request->car_id);
        $carStatus->update([
            'status' => $this->carStatus
            ]);
         $response = $workshop->getStore($create);

         if($response['success']){
            return redirect()
                        ->route('RendelCar.Car-list')
                        ->with('success', $response['message']); 
        }
        return redirect()
                    ->back()
                    ->with('error', $response(['message'])); 
    }
    public function available($id, WorkShop $workshop, Car $car)
    {
        $edit = $workshop->find($id);
        //return dd($edit->car_id);
        $update = $edit->update([
            'status' => $this->shopStatus,
            'exit'   => date('Ymd')
        ]);
        $carStatus = $car->find($edit->car_id);
        $carStatus->update([
            'status' => $this->carExit
            ]);
        if($update){
            session()->flash('success', 'Conserto concluído!');
                return redirect('RendelCar/Car-list');
        }
         session()->flash('error', 'Erro ao da baixar na oficina!');
             return redirect('RendelCar/workshop-list');
    }
    public function show($id, Car $car, WorkShop $workshop, User $user)
    {
        $show = $workshop->find($id);
        
       return view('WorkShop.show-shop', compact('show'));

    }
}
