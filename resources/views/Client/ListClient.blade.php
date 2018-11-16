@extends('adminlte::page')

@section('title', 'LocVeículos - Clientes')

@section('content_header')
    <h1>Lista</h1>
@stop

@section('content')
   <div class="box">
    <div class="box-header">
        <h4>Clientes LocVeículos</h4>
        <a href="{{route('home')}}" class="btn btn-success"><i class="fa fa-reply"></i></a>
        <a href="{{route('RendelCar.create')}}" class="btn btn-success"><i class="fa fa-id-card-o"></i></a>
    </div>

    <div class="box-body">
            @include('Msg.msg-success')
           
            
<!--formulário para castra clientes  -->
<table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Código do cliente</th>
                <th>Nome</th>
                <th>N° Cpf</th>
                <th>N° Cnh</th>
                <th>N° Telfone</th>
                <th>Opções</th>
                
            </tr>
        </thead>
        @foreach($listClient as $client)
        <tbody>
           
            <tr>
                <td> {{  $client->id    }}</td>
                <td> {{  strtoupper($client->name)    }}</td>
                <td> {{  $client->cpf    }}</td>
                <td> {{  $client->cnh    }}</td>
                <td> {{  $client->fone    }}</td>
                <td>  
                    <a href="{{route('RendelCar.edit', $client->id)}}" class="btn btn-primary actions"><i class="fa fa-pencil-square-o "></i></a>
                    <a href="{{route('RendelCar.show', $client->id)}}" class="btn btn-warning actions"><i class="fa fa-eye "></i></a>
                </td> 
            </tr>
        </tbody>
        @endforeach
    </table>
    {!! $listClient->links() !!}
   </div>
@stop