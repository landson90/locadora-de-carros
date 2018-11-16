@extends('adminlte::page')

@section('title', 'LocVeículos - Oficina')

@section('content_header')
    <h1>Oficina</h1>
@stop

@section('content')
   <div class="box">
       
    <div class="box-header">
        <h4>Oficina LocVeículos</h4>
        <a href="{{route('RendelCar.Car-list')}}" class="btn btn btn-success"><i class="fa fa-reply"></i></a>
        <a href="{{route('RendelCar.Car-create')}}" class="btn btn-success"><i class="fa fa-id-card-o"></i></a>
    </div>

    <div class="box-body">
            
            @include('Msg.msg-success')
           
            
<!--formulário para castra clientes  -->
<table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Código do carro</th>
                <th>Tipo do problema</th>
                <th>Modelo</th>
                <th>Placa</th>
                <th>Descrição</th>
                <th>Entrada</th>
                <th>Saída</th>
                <th>Status</th>
                <th>Opções</th>
                
            </tr>
        </thead>
        @foreach($listShop as $shop)
        @can('view', $shop)
        <tbody>
           
            <tr>
                <td> {{  $shop->id    }}</td>
                <td> {{  $shop->problem    }}</td>
                <td>
                    @if($shop->car_id)
                        {{strtoupper($shop->car->modelo)}}
                    @endif
                </td>
                <td>
                @if($shop->car_id)
                        {{strtoupper($shop->car->placa)}}
                    @endif
                </td>
                <td> {{ $shop->description }} </td>
                <td> {{  $shop->entry    }}</td>
                <td> {{ $shop->exit    }}</td>

                <td>
                   @if($shop->status == 1)
                        <p><b>No Conserto</b></p>
                   @else
                        <p><b>Concluído</b></p>
                   @endif
                </td>
                
                <td> 
                <a href="{{route('RendelCar.workshop-show', $shop->id)}}" class="btn btn-warning actions"><i class="fa fa-eye"></i></a>
                @if($shop->status == 1)
                    <a href="{{route('RendelCar.workshop-available',$shop->id)}}" class="btn btn-primary actions"><i class="fa fa-sign-out"></i></a>
                @endif
                </td> 
            </tr>
        </tbody>
        @endcan
        @endforeach
    </table>
    {!! $listShop->links() !!}
   </div>
@stop