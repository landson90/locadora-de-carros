@extends('adminlte::page')

@section('title', 'LocVeículos - Clientes')

@section('content_header')
    <h1>Lista</h1>
@stop

@section('content')
   <div class="box">
    <div class="box-header">
        <div class="container">
            <h4>Permissões - LocVeículos</h4>
            <a href="{{route('home')}}" class="btn btn-success"><i class="fa fa-reply"></i></a>
            <a href="{{route('RandelCar.permissoes.perfil.create', $permissions->id)}}" class="btn btn-success"><i class="fa fa-id-card-o"></i></a>
            <a href="{{route('RandelCar.permissoes.perfil.create', $permissions->id)}}" class="btn btn-success">cadastra</a>
            <h2>Lista perfil vinculados a Permissão : <b>{{$title}}</b></h2>
        </div>
    </div>
    <div class="box-body">
            @include('Msg.msg-success')
           
            
<!--formulário para castra clientes  -->
<table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Código do perfil</th>
                <th>Nome</th>
                <th>Descrisção</th>
                <th>Opções</th>
                
            </tr>
        </thead>
         @foreach($perfil as $perfils)
        <tbody>
           
            <tr>
                <td>{{$perfils->id}}</td>
                <td> {{  strtoupper($perfils->name)    }}</td>
                <td> {{  $perfils->label    }}</td>
                <td> 
                <a href="#" class="btn btn-warning actions"><i class="fa fa-eye "></i></a>
                    <a  href="{{route('RandelCar.permissoes.perfil.delete', [$permissions->id, $perfils->id ])}}" class="btn btn-danger actions" href="#"><i class="fa fa-trash"></i></a>
                </td> 
            </tr>
        </tbody>
        @endforeach
    </table>
    
   </div>
@stop