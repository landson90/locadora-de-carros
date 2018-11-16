@extends('adminlte::page')

@section('title', 'LocVeículos - Locação')

@section('content_header')
    <h1>Encerrar Contrato - LocVeículos</h1>
   
@stop

@section('content')
   <div class="box">
    <div class="box-header">
            <a href="{{route('RendelCar.location-list')}}" ><i class="fa fa-reply"></i></a>
    </div>

    <div class="box-body">
        <h2><b>Termino </b></h2>
        <hr>
        @include('Msg.msg-success')
        <form action="{{route('RendelCar.Terminate-Contract', $location->id)}}" method="POST">
                {!! csrf_field() !!}
            <div class="row">
               <div class="form-group col-md-3">
                   <label for="data">Data prevista para devolução</label>
                   <input type="text" class="form-control"
                    name="devolution" value="{{$location->devolution}}"
                   disabled>
                </div>

                <div class="form-group col-md-3">
                    <label for="delivery">Data da entrega</label>
                    <input type="date" class="form-control" 
                    name="delivery">
                    <input type="hidden" name="status" value="{{$close}}">
                    <input type="hidden" name="car_id" value="{{$location->car_id}}">
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-info">Salvar</button>
                </div>     
            </div>
        </form>
    </div>
@stop