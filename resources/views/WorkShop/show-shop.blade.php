@extends('adminlte::page')

@section('title', 'LocVeículos - Oficina')

@section('content_header')
    <h1>Informações da oficina</h1>
@stop

@section('content')
   <div class="box">
       
    <div class="box-header">
        <a href="{{route('RendelCar.Car-list')}}"><i class="fa fa-reply"></i></a>
        <h2><b>Registro da oficina</b></h2>
        
    </div>
   
    <div class="box-body">
        
        
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Problema do veículo :    {{$show->problem}}</h3></div>
                <div class="panel-body">
                    <h4><b>Descrição do problema</b> <br>
                        {{$show->description}}
                    </h4>
                    <hr>
                    <h4><b>Previção de saída</b> <br>{{$show->exit}}</h4>
                    <hr>
                    <h4><b>Modelo do carro :</b><br>
                        @if($show->car_id)
                            {{strtoupper($show->car->modelo)}}
                        @endif
                    </h4>
                    <hr>
                    <h4><b>N° placa :</b><br>
                        @if($show->car_id)
                            {{strtoupper($show->car->placa)}}
                        @endif
                    </h4>
                    <hr>
                    <a href="{{route('RendelCar.workshop-available',$show->id)}}" class="btn btn-danger actions">Da Baixa</a>
                </div>
          </div>
    </div>
@stop