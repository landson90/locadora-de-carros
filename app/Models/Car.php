<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use App\Models\WokrShop;

class Car extends Model
{
    //
    protected $fillable = [
        'marca', 'modelo', 'placa', 'status'
    ];
    public function location()
    {
        return $this->hasMany(Location::class);
    }
    public function workshop()
    {
        return $this->hasMany(WorkShop::class);
    }
    public function getCar($idCar)
    {
       return $this->where('placa', 'LIKE', "%$idCar%")
                    ->where('status', 0)
                    ->orWhere('modelo', $idCar)
                    ->get()
                    ->first();
       
    }
    public function getStore($valueCar)
    {
        //return dd($valueCar);
        $response = $this->create($valueCar);
        if($response){
            return [
                'success' => true,
                'message' => 'Carro registrado com sucesso!'
            ];
        }else{
         
            return [
                'success' => false,
                'message' => 'Erro ao registra carro!'
            ];
        }

    }
    public function getUpdate($valueCliente)
    {
       $response = $this->update($valueCliente);

       if($response){
           return [
               'success'    => true,
                'message'   =>'Registro alterado com sucesso!'
           ];
       }else{
           return [
               'success'    => false,
               'message'    => 'Não é possivel altera registro.' 
           ];
       }
    }
    public function getPlacaAttribute()
    {
        $placa = $this->attributes['placa'];
        return substr($placa, 0, 3). '-'. substr($placa, -4);
    }
}
