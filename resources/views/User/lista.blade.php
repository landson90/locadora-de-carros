@extends('adminlte::page')

@section('title', 'LocVeículos - Clientes')

@section('content_header')
    <h1>Lista de usuários</h1>
@stop

@section('content')
   <div class="box">
    <div class="box-header">
        <h4>Clientes LocVeículos</h4>
        <a href="{{route('home')}}" class="btn btn-success"><i class="fa fa-reply"></i></a>
        <a href="{{route('RandelCar.create.usuario')}}" class="btn btn-success"><i class="fa fa-id-card-o"></i></a>
    </div>

    <div class="box-body">
           
            
<!--formulário para castra clientes  -->
<table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Código do perfil</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Opções</th>
                
            </tr>
        </thead>
        @foreach($users as $user)
        <tbody>
           
            <tr>
                <td> {{  $user->id    }}</td>
                <td> {{  strtoupper($user->name)    }}</td>
                <td> {{  $user->email    }}</td>
                <td>  
                    <a href="{{route('RandelCar.usuario-perfil', $user->id)}}" class="btn btn-primary actions"><i class="fa fa-users" aria-hidden="true"></i></a>
                    <a href="{{route('RandelCar.perfil-show', $user->id)}}" class="btn btn-warning actions"><i class="fa fa-eye "></i></a>
                
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    {!! $users->links() !!}
   </div>
@stop