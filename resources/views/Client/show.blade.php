@extends('adminlte::page')

@section('title', 'LocVeículos -Clientes')

@section('content_header')
    <h1>Informações</h1>
@stop

@section('content')
   <div class="box">
    <div class="box-header">
        <a href="{{route('RendelCar.clientes')}}"><i class="fa fa-reply"></i></a>
        <h2><b>Registro do Cliente</b></h2>
        
    </div>

    <div class="box-body">
            <div class="panel panel-default">
                    <div class="panel-heading"><h3><b>{{$record->name}}</b></h3></div>
                    <div class="panel-body">
                      <h4><b>N° do Registro: <b>{{$record->id}}</b></h4>
                      <hr>
                      <h4><b>N° do Rg: <b>{{$record->rg}}</b></h4>
                      <hr>
                      <h4><b>N° do Cpf: <b>{{$record->cpf}}</b></h4>
                      <hr>
                      <h4><b>N° do Cnh: <b>{{$record->cnh}}</b></h4>
                      <hr>
                      <h4><b>N° do Telefone: <b>{{$record->fone}}</b></h4>
                      <hr>
                      <h4><b>Endereço cliente: <b>{{$record->endereco}}</b></h4>
                      <hr>
                    </div>
                  </div>
    </div>
@stop