@extends('adminlte::page')

@section('title', 'LocVeículos - Locação')

@section('content_header')
    <h1>Home LocVeículos</h1>
@stop

@section('content')
   <div class="box">
    <div class="box-header">

    </div>

    <div class="box-body">
        @include('Msg.msg-success')
        <h2><b>Informação do Cliente</b></h2>
        <hr>
        <form action="{{route('RendelCar.location-effect')}}" method="POST">
                {!! csrf_field() !!}
            <div class="row">
               <div class="form-group col-md-6">
                   <label for="name">Nome</label>
                   <input type="text" class="form-control" 
                   placeholder="Nome completo" name="name" disabled
                   value="{{$idClient->name}}">
               </div>
            </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="cpf">N° Cpf</label>
                        <input type="text" class="form-control" 
                        placeholder="N° do CPF "  name="cpf" disabled
                        value="{{$idClient->cpf}}">
                    </div>

                    <div class="form-group col-md-4">
                            <label for="cnh">N° Cnh</label>
                            <input type="text" class="form-control" 
                            placeholder="N° da CNH "  name="cnh" disabled 
                            value="{{$idClient->cnh}}">
                    </div>
                    <input type="hidden" name="client_id" value="{{$idClient->id}}">            
                </div>
            <hr>
            <h2><b>Informação do Carro</b></h2>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="modelo">Modelo</label>
                        <input type="text" class="form-control" 
                        placeholder="Modelo do carro"  name="modelo" disabled
                        value="{{$idCar->modelo}}">
                    </div>
                       <div class="form-group col-md-4">
                            <label for="placa">N° Placa</label>
                            <input type="text" class="form-control" 
                            placeholder="N° Placa (Ex: plo-0987)"  name="placa" disabled
                            value="{{$idCar->placa}}">
                       </div>
                       <input type="hidden" name="car_id" value="{{$idCar->id}}">
                   </div>
                   <hr>
                   <h2><b>Informação da locação</b></h2>
                   <div class="row">
                       <div class="form-group col-md-4">
                           <label for="value">Valor do contrado</label>
                           <input type="text" class="form-control" name="value"
                           placeholder="valor da locação (EX: 150)" 
                           value="{{  $mony  }}" disabled>
                       </div>
                       <input type="hidden" name="value" value="{{  $mony   }}">
                       <div class="row">
                        <div class="form-group col-md-4">
                            <label for="date">Data da locação</label>
                            <input type="text" class="form-control" name="date" 
                            value="{{   $day   }}" disabled>
                        </div>
                        <input type="hidden" name="date" value="{{  $dayBanco   }}">
                       </div>
                   </div>
                    <hr>
                    <h2><b>Data da devolução do veículo</b></h2>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="devolution">Data da devolução</label>
                            <input type="text" class="form-control" name="devolution" 
                            value="{{   $devolution   }}" disabled>
                        </div>
                        <input type="hidden" name="devolution" value="{{  $devolutionBanco   }}">
                        <input type="hidden" name="delivery" value="{{  $devolutionBanco   }}">
                        <input type="hidden" name="status" value="{{  $status   }}">
                    </div>
                    <hr>
                   <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-info">Contrata <i class="fa fa-handshake-o"></i></button>
                    </div>
                </div>
                </div>
        </form>
    </div>
@stop