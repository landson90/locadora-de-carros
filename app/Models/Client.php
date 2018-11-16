<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Location;

class Client extends Model
{
    //
    protected $fillable = [
        'name', 'rg','cpf', 'cnh', 'endereco', 'fone'
    ];
    public function location()
    {
        return $this->hasMany(Location::class);
    }
    public function getCliente($idClient)
    {
        return $this->where('cpf', 'LIKE', "%$idClient%")
                        ->orWhere('cnh', $idClient)
                        ->orWhere('name', $idClient)
                        ->get()
                        ->first();
    }
    public function getStore($valueCliente)
    {
        //return dd($valueCliente);
       $response = $this->create($valueCliente);
        if($response){
            return [
                'success' => true,
                'message' => 'Cliente cadastrado com sucesso!'
            ];
        }else{
         
            return [
                'success' => false,
                'message' => 'Erro ao cadastra cliente!'
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
    public function getCpfAttribute()
    {
        $cpf = $this->attributes['cpf'];
        return substr($cpf, 0, 3).'.'.substr($cpf, 3,3).'.'.substr($cpf, 7,3).'-'.substr($cpf, -2);
    }
    public function getCnhAttribute()
    {
        $cnh = $this->attributes['cnh'];
        return substr($cnh, 0, 3). '.'. substr($cnh, 3, 3).'.'.substr($cnh, 7,3).'-'.substr($cnh, -2);
    }
    public function getFoneAttribute()
    {
        $fone = $this->attributes['fone'];
        return '('. substr($fone, 0, 2).')'. substr($fone, 2, 5). '-'. substr($fone, -4);
    }
}
