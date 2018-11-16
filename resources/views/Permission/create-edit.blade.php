@extends('adminlte::page')

@section('title', 'LocVeículos - Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
   <div class="box">
    <div class="box-header">
            <a href="{{route('RendelCar.clientes')}}" ><i class="fa fa-reply"></i></a>
        <h4>Formulário para novos permisões</h4>
    </div>

    <div class="box-body">
        
<!--formulário para castra clientes  -->

        
    <form action="{{route('RandelCar.permissoes.store')}}" method="POST">        
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-9">
                   <div class="form-group">
                        <label for="name">Nome do permisões</label>
                        <input type="text" class="form-control" name="name" placeholder="Nome completo" 
                        >
                   </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-md-4">
                       <div class="form-group">
                            <label for="description">Pequeno text sobre o permisões</label>
                            <input type="text" class="form-control" name="description" placeholder="N° Rg  sem os pontos (Ex:0123321)"
                            >
                       </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <button   type="submit"  class="btn btn-info">Cadastra</button>
                    </div>
                </div>
        </form>
   </div>
@stop