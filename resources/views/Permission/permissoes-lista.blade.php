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
        <a href="{{route('RandelCar.permissoes.create')}}" class="btn btn-success"><i class="fa fa-id-card-o"></i></a>
    </div>
    <div class="container">
    <h2>Lista de permissões</h2>
    </div>
    <div class="box-body">
        @include('Msg.msg-success')
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
        @foreach($permissions as $permission)
        <tbody>
           
            <tr>
                <td> {{  $permission->id    }}</td>
                <td> {{  strtoupper($permission->name)    }}</td>
                <td> {{  $permission->description    }}</td>
                <td>  
                    <a href="#" class="btn btn-warning actions"><i class="fa fa-eye "></i></a>
                    <a href="{{route('RandelCar.permissoes.perfil', $permission->id)}}" class="btn btn-danger actions"><i class="fa fa-users" aria-hidden="true"></i></a>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    {!! $permissions->links() !!}
   </div>
@stop