<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use Carbon\Carbon;

class WorkShop extends Model
{
    //
    protected $fillable = [
        'problem', 'status', 'entry', 'exit', 'description', 'car_id', 'user_id'
    ];
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }
    public function getEntryAttribute($value)
    {
        return carbon::parse($value)->format('d/m/Y');
    }
    public function getExitAttribute($value)
    {
        return carbon::parse($value)->format('d/m/Y');
    }
    public function getStore($valueWorkShop)
    {
        //return dd($valueCar);
        $response = $this->create($valueWorkShop);
        if($response){
            return [
                'success' => true,
                'message' => 'Carro esta na oficina!'
            ];
        }else{
         
            return [
                'success' => false,
                'message' => 'Erro ao registra carro na oficina!'
            ];
        }

    }
}
