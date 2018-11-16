@extends('adminlte::page')

@section('title', 'LocVeículos - Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
   <div class="box">
    <div class="box-header">
            <a href="{{route('RendelCar.clientes')}}" ><i class="fa fa-reply"></i></a>
    <h4>Adicionar novos usuarios ao perfil: <b>{{$profiles->name}}</b></h4>
    </div>

    <div class="box-body">
<!--formulário para castra clientes  -->

        
    <form action="{{route('RandelCar.perfil.usuario.strore', $profiles->id)}}" method="POST">        
            {!! csrf_field() !!}
            @foreach ($users as $user)
    
                
                <div class="form-check">
  <input class="form-check-input" type="checkbox"value="{{$user->id}}" id="defaultCheck1" name="user">
  <label class="form-check-label" for="defaultCheck1">
    {{$user->name}}
  </label>
</div>
            @endforeach

            <div class="row">
                    <div class="col-md-10">
                        <button   type="submit"  class="btn btn-info">Cadastra</button>
                    </div>
                </div>
        </form>
   </div>
@stop