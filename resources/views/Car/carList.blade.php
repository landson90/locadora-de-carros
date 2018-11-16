@extends('adminlte::page')

@section('title', 'LocVeículos - Carros')

@section('content_header')
    <h1>Lista</h1>
@stop

@section('content')
   <div class="box">
       
    <div class="box-header">
        <h4>Carros LocVeículos</h4>
        <a href="{{route('home')}}" class="btn btn btn-success"><i class="fa fa-reply"></i></a>
        <a href="{{route('RendelCar.Car-create')}}" class="btn btn-success"><i class="fa fa-id-card-o"></i></a>
        <a href="{{route('RendelCar.workshop-list')}}" class="btn btn btn-success"><i class="fa fa-wrench"></i></a>
    </div>

    <div class="box-body">
            
            @include('Msg.msg-success')
           
            
<!--formulário para castra clientes  -->
<table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Código do carro</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Placa</th>
                <th>Status</th>
                <th>Opções</th>
                
            </tr>
        </thead>
        @foreach($listCar as $car)
        <tbody>
           
            <tr>
                <td> {{  $car->id    }}</td>
                <td> {{  strtoupper($car->marca)    }}</td>
                <td> {{  strtoupper($car->modelo)    }}</td>
                <td> {{  strtoupper($car->placa)    }}</td>
                <td>
                    @if($car->status == 0)
                        <p><b>Na Loja</b></p>
                    @elseif($car->status == 2)
                        <p><b>Oficina</b></p>
                    @else
                        <p><b>Locado</b></p>
                    @endif
                </td>
                <td> 
                    @if($car->status == 0) 
                        <a href="{{route('RendelCar.car-edit', $car->id)}}" class="btn btn-primary actions"><i class="fa fa-pencil-square-o "></i></a>
                    @endif
                    <a href="{{route('RendelCar.car-show', $car->id)}}" class="btn btn-warning actions"><i class="fa fa-eye"></i></a>
                    @if($car->status == 0)
                        <a href="{{route('RendelCar.car-workshop', $car->id)}}" class="btn btn-primary actions"><i class="fa fa-wrench"></i></a>
                    @endif
                </td> 
            </tr>
        </tbody>
        @endforeach
    </table>
    {!! $listCar->links() !!}
   </div>
@stop