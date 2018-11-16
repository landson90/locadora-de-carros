@extends('adminlte::page')

@section('title', 'LocVeículos - Carros')

@section('content_header')
    <h1>Carros</h1>
@stop

@section('content')
   <div class="box">
    <div class="box-header">
            <a href="{{route('RendelCar.Car-list')}}" ><i class="fa fa-reply"></i></a>
        <h4>Formulário para novos carros</h4>
    </div>

    <div class="box-body">
        @include('Msg.msg-success')
<!--formulário para castra clientes  -->

        @if(isset($idCar))
            <form action="{{route('RendelCar.car-update', $idCar->id)}}" method="POST">
                {!! csrf_field() !!}
        @else
            <form action="{{route('RendelCar.Car-store')}}" method="POST">
        @endif
            {!! csrf_field() !!}
            <div class="row">

                <div class="form-group col-md-3">
                    <label for="marca">Marca</label>
                    <input type="text" class="form-control" name="marca"
                        placeholder="Marca do carro"  value="{{$idCar->marca or old('marca')}}">
                </div>

                <div class="form-group col-md-3">
                    <label for="modelo">Modelo</label>
                    <input type="text" class="form-control" name="modelo"
                    placeholder="Modelo do carro" value="{{$idCar->modelo or old('modelo')}}">
                </div>

                <div class="form-group col-md-3">
                        <label for="placa">Placa</label>
                        <input type="text" class="form-control" name="placa"
                        placeholder="N° da placa (Ex:abc0978)">
                </div>
                
            </div>
           
            <div class="row">
                    <div class="col-md-9">
                            <button class="btn btn-info" type="submit">Cadastra</button>
                    </div>
            </div>
        </form>
   </div>
@stop