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
            <form action="{{route('RendelCar.workshop-create')}}" method="POST">
        @endif
            {!! csrf_field() !!}
            <div class="row">

                <div class="form-group col-md-3">
                    <label for="problem">Nome do defeito</label>
                    <input type="text" class="form-control" name="problem"
                        placeholder="Nome do defeito">
                </div>

                <div class="form-group col-md-3">
                    <label for="entry">Entrada na oficina</label>
                    <input type="date" class="form-control" name="entry">
                </div>

                <div class="form-group col-md-3">
                    <label for="exit">Data da saída da oficina</label>
                    <input type="date" class="form-control" name="exit">
                </div>
                
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="description">Descrição do defeito</label>
                    <textarea  id="" cols="30" rows="10" class="form-control" name="description"></textarea>
                </div>
            <input type="hidden" name="car_id" value="{{$carId}}">
            <input type="hidden" name="status" value="{{$status}}">
            <input type="hidden" name="user_id" value="{{$users}}">
            </div>
           
            <div class="row">
                    <div class="col-md-9">
                            <button class="btn btn-info" type="submit">Cadastra</button>
                    </div>
            </div>
        </form>
   </div>
@stop