@extends('adminlte::page')

@section('title', 'LocVeículos')

@section('content_header')
    <h1>Home LocVeículos</h1>
@stop

@section('content')
   <div class="box">
    <div class="box-header">

    </div>
    <div class="container">
      <h1>Usuário logado <b>{{$userName}}</b></h1>
    </div>
    <div class="box-body">

      <!--Botao de perfil-->
      @can('GERENTE')
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">          
                <span class="info-box-icon bg-aqua"><i class="fa fa-list-alt"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"> Perfil </span>
                {{$profile}}
                <br>
              <a href="{{route('RandelCar.perfil-lista')}}">Listar</a><br>
              <a href="{{route('RandelCar.perfil-create')}}">Cadastra</a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      @endcan
<!--Botao de clientes-->
@can('ATENDENTE')
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">          
                <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"> Clientes </span>
              {{ $client }}
                <br>
              <a href="{{route('RendelCar.clientes')}}">Listar</a><br>
              <a href="{{route('RendelCar.create')}}">Cadastra</a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
@endcan
@can('GERENTE')
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">          
                <span class="info-box-icon bg-aqua"><i class="fa fa-unlock-alt"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"> Permissão </span>
              {{$permission}}
                <br>
              <a href="{{route('RandelCar.permissoes.lista')}}">Listar</a><br>
              <a href="{{route('RandelCar.permissoes.create')}}">Cadastra</a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
@endcan
<!-- BOTAO DO CADASTRO FUNCIONARIO -->
<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">          
                <span class="info-box-icon bg-aqua"><i class="fa fa-id-badge"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"> Recursos Humanos </span>
              {{$userContador}}
                <br>
              <a href="{{route('RandelCar.usuario.lista')}}">Listar</a><br>
              <a href="{{ url(config('adminlte.register_url', 'register')) }}">Cadastra</a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
<!--Botao de carros-->
@can('mecanico')
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-car"></i></span>  
              <div class="info-box-content">
                <span class="info-box-text"> Carros </span>
                {{ $car }}
                <br>
                <a href="{{route('RendelCar.Car-list')}}">Listar</a><br>
                <a href="{{route('RendelCar.Car-create')}}">Cadastra</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
@endcan        
<!--Botao de locação-->
@can('ATENDENTE')
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box ">
                <span class="info-box-icon bg-aqua"><i class="fa fa-id-card-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"> Locação</span>
                {{ $location }}
                <br>
                <a href="{{route('RendelCar.location-list')}}">Listar</a><br>
                <a href="{{route('RendelCar.location-create')}}">Contrato de locação</a>
                    </ul>
                  </li>
                  
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          @endcan
   </div>
@stop