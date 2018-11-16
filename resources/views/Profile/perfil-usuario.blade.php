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
    <div class="container">
    <h2>Lista de usuários vinculados ao perfil : <b>{{$title}}</b></h2>
    <a href="{{route('RandelCar.perfil.usuario.cadastra', $profile->id)}}" class="btn btn-success">cadastra</a>
</div>
    <div class="box-body">
            @include('Msg.msg-success')
           
            
<!--formulário para castra clientes  -->
<table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Código do usuario</th>
                <th>Nome</th>
                <th>E-mail</th>
               
                <th>Opções</th>
                
            </tr>
        </thead>
         @foreach($users as $user)
        <tbody>
           
            <tr>
                <td>{{$user->id}}</td>
                <td> {{  strtoupper($user->name)    }}</td>
                <td> {{  $user->email    }}</td>
                <td>  
                    <a  class="btn btn-primary actions"><i class="fa fa-pencil-square-o "></i></a>
                    <a class="btn btn-warning actions"><i class="fa fa-eye "></i></a>
                <a class="btn btn-danger actions" href="{{route('RandelCar.perfil.usuario.delete', [$profile->id, $user->id])}}"><i class="fa fa-trash"></i></a>
                </td> 
            </tr>
        </tbody>
        @endforeach
    </table>
    
   </div>
@stop