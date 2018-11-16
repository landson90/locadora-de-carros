@extends('adminlte::page')

@section('title', 'LocVeículos - Carro')

@section('content_header')
    <h1>Informações</h1>
@stop

@section('content')
   <div class="box">
       
    <div class="box-header">
        <a href="{{route('RendelCar.Car-list')}}"><i class="fa fa-reply"></i></a>
        <h2><b>Registro do Carro</b></h2>
        
    </div>
   
    <div class="box-body">
        
        
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Status do veículo :  
                    @if($record->status == 0)
                        <b>Na Loja</b></h3>
                    @elseif($record->status == 1)
                        <b>Loocado</b></h3>
                    @else
                        <b>Oficina</b></h3>
                    @endif
                </h3></div>
                <div class="panel-body">
                    <h4><b>Modelo : {{strtoupper($record->modelo)}}</b></h4>
                    <hr>
                    <h4><b>Marca do carro : <b> {{strtoupper($record->marca)}}</b></h4>
                    <hr>
                    <h4><b>N° da Placa : <b> {{strtoupper($record->placa)}}</b></h4>
                </div>
          </div>
    </div>
@stop