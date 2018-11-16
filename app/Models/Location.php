<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Car;
use Carbon\Carbon;

class Location extends Model
{
    //
    protected $fillable = [
        'client_id', 'car_id', 'value', 'date', 'devolution', 'delivery', 'status'
    ];
    
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id'); 

    }
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id'); 

    }
    public function getStore($value)
    {
    
        $response = $this->create($value);
        if($response){

            return [
                'success' => true,
                'message' => 'Contrato finalizado com sucesso!'
            ];
        }else{
         
            return [
                'success' => false,
                'message' => 'Erro ao finalizar contrato!'
            ];
        }

    }
    public function getDateAttribute($value)
    {
        return carbon::parse($value)->format('d/m/Y');
    }
    public function getDevolutionAttribute($value)
    {
        return carbon::parse($value)->format('d/m/Y');
    }
    public function getUpdate($value)
    {
       
        $response = $this->update($value);
        
        if($response){
            return [
                'success'    => true,
                 'message'   =>'Contrato fechado com sucesso'
            ];
        }else{
            return [
                'success'    => false,
                'message'    => 'Erro ao fechar contrato.' 
            ];
        }
    }
   
}

        