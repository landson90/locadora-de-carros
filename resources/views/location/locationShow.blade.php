@extends('adminlte::page')

@section('title', 'LocVeículos - Carro')

@section('content_header')
    <h1>Informações</h1>
@stop

@section('content')
   <div class="box">
       
    <div class="box-header">
            
        <h2><b>Registro da locação</b></h2>
        <a href="{{route('RendelCar.location-list')}}" class="btn btn-success"><i class="fa fa-reply"></i></a>
    </div>
   
    <div class="box-body">
        
        
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Status do contrato : 
                    @if($locationId->status == 2)
                        Multa por atraso
                    @else
                        Sem multa
                    @endif
                    <b> </b></h3></div>
                <div class="panel-body">
                    <h3>Dados do cliente</h3>
                    <hr>
                    <h4>Nome do titular do contrato : 
                        @if($locationId->client_id)
                            {{ strtoupper($locationId->client->name) }} 
                        @endif   
                    </h4>
                    <h4>Cpf do titular : 
                        @if($locationId->client_id)
                            {{ strtoupper($locationId->client->cpf) }}
                        @endif
                    </h4>
                    <h4>Cnh do titular : 
                        @if($locationId->client_id)
                            {{ strtoupper($locationId->client->cnh) }}
                        @endif 
                    </h4>
                    <hr>
                    <h3><b>Dados do carro <b> </b></h3>
                    <hr>
                    <h4>Modelo :
                        @if($locationId->car_id)
                            {{ strtoupper($locationId->car->modelo) }}
                        @endif 
                    </h4>
                    <h4>Placa : 
                        @if($locationId->car_id)
                            {{ strtoupper($locationId->car->placa) }}
                        @endif
                    </h4>
                </div>
          </div>
    </div>
@stop