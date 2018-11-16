@extends('adminlte::page')

@section('title', 'LocVeículos - Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
   <div class="box">
    <div class="box-header">
            <a href="{{route('RendelCar.clientes')}}" ><i class="fa fa-reply"></i></a>
        <h4>Formulário para novos clientes</h4>
    </div>

    <div class="box-body">
        @include('Msg.msg-success')
<!--formulário para castra clientes  -->

        @if(isset($edit))
            <form action="{{route('RendelCar.update', $edit->id)}}" method="POST">
        {!! csrf_field() !!}
        @else
            <form action="{{route('RendelCar.store')}}" method="POST">
        @endif        
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-9">
                   <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" name="name" placeholder="Nome completo" 
                        value="{{$edit->name or old('name')}}">
                   </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-md-4">
                       <div class="form-group">
                            <label for="rg">N° Rg</label>
                            <input type="text" class="form-control" name="rg" placeholder="N° Rg  sem os pontos (Ex:0123321)"
                            >
                       </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                         <label for="cpf">N° Cpf</label>
                        <input type="text" class="form-control" name="cpf" placeholder="N° Cpf sem os pontos (Ex:12332112300)"
                        >
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cnh">N° Cnh</label>
                            <input type="text" class="form-control" name="cnh" placeholder="N° Cnh sem os pontos (Ex:11122233344)"
                            >
                         </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fone">N° Fone</label>
                            <input type="text" class="form-control" name="fone" placeholder="N° Telefone (Ex:81912344321)"
                            >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" name="endereco" placeholder="Endereço"
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