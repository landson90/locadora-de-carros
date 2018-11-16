@extends('adminlte::page')

@section('title', 'LocVeículos - Locação')

@section('content_header')
    <h1>Solicitação de locação - LocVeículos</h1>
@stop

@section('content')
   <div class="box">
    <div class="box-header">

    </div>

    <div class="box-body">
        <h2><b>Informação do Cliente</b></h2>
        <hr>
        @include('Msg.msg-success')
        <form action="{{route('RendelCar.location-search')}}" method="POST">
                {!! csrf_field() !!}
            <div class="row">
               <div class="form-group col-md-6">
                   <label for="name">Nome</label>
                   <input type="text" class="form-control" 
                   placeholder="Nome completo" name="name">
               </div>
            </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="cpf">N° Cpf</label>
                        <input type="text" class="form-control" 
                        placeholder="N° do CPF sem os pontos"  name="cpf">
                    </div>

                    <div class="form-group col-md-4">
                            <label for="cnh">N° Cnh</label>
                            <input type="text" class="form-control" 
                            placeholder="N° da CNH sem os pontos"  name="cnh">
                    </div>            
                </div>
            <hr>
            <h2><b>Informação do Carro</b></h2>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="modelo">Modelo</label>
                        <input type="text" class="form-control" 
                        placeholder="Modelo do carro"  name="modelo">
                    </div>

                    <div class="form-group col-md-4">
                            <label for="cnh">N° Placa</label>
                            <input type="text" class="form-control" 
                            placeholder="N° Placa (Ex: plo0987)"  name="placa">
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