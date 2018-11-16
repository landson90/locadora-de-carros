@extends('adminlte::page')

@section('title', 'LocVeículos - locaçães')

@section('content_header')
    <h1>Lista</h1>
@stop

@section('content')
   <div class="box">
    <div class="box-header">
        <h4><b>Contratos da LocVeículos</b></h4>
        <a href="{{route('home')}}" class="btn btn-success"><i class="fa fa-reply"></i></a>
            <a href="{{route('RendelCar.location-create')}} " class="btn btn-success"> <i class="fa fa-id-card-o"></i></a>
    </div>

    <div class="box-body">
            @include('Msg.msg-success')
<!--formulário para castra clientes  -->
<table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Data da devolução</th>
                <th>Valor do contrato</th>
                <th>Nome do cliente</th>
                <th>N° CPF</th>
                <th>Modelo do carro</th>
                <th>N° placa</th>
                <th>Status</th>
                <th>Multa</th>
                <th>Opções</th>   
            </tr>
        </thead>
        @foreach($locations as $location)
        <tbody>
            <tr>
                <td>{{  $location->devolution   }}</td>
                <td>R$: {{  number_format($location->value , 2, '.', ',')   }}</td>
                <td>
                    @if($location->client_id)
                        {{ strtoupper($location->client->name)}}
                    @endif
                </td>
                <td>
                    @if($location->client_id)
                        {{ $location->client->cpf}}
                    @endif
                </td>
                <td>
                    @if($location->car_id)
                        {{ strtoupper($location->car->modelo)}}
                    @endif
                </td>
                <td>
                    @if($location->car_id)
                        {{ strtoupper($location->car->placa)}}
                    @endif
                </td>
                <td>
                    @if($location->status == 0 || $location->status == 2)
                        <p><b>Fechado</b></p>
                    @else
                        <p><b>Em aberto</b></p>
                    @endif
                </td>
                <td>
                    @if($location->status == 2)
                           <i class="fa fa-check"></i>
                    @else
                        <p>-</p>
                    @endif
                </td>

                <td>  
                    <a href="{{route('RendelCar.Show-Contract', $location->id)}}" class="btn btn-warning actions"><i class="fa fa-eye"></i></a>
                @if($location->status == 1)
                    <a href="{{route('RendelCar.Close-Contract', $location->id)}}" class="btn btn-danger actions"><i class="fa fa-times"></i></a>
                @endif
                </td> 
            </tr>
        </tbody>
       @endforeach
    </table>
    {!! $locations->links() !!}
   </div>
@stop