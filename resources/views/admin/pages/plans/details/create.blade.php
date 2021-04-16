@extends('adminlte::page')

@section('title', 'Cadastrar Novo Detalhe')

@section('content_header')
    <h1>Cadastrar Novo Detalhe do Plano: {{ $plan->name }} </h1>
@stop

@section('content')

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="w3-card-4">
        <header class="w3-dark-gray py-1"><h3 class="ml-1">Cadastrar de Novo Detalhe</h3></header>
        <div class="w3-container">
          <form action="{{ route('details.plan.store', $plan->url) }}" class="form" method="POST">
            
            

            @include('admin.pages.plans.details._partials.form')

            <div class="row justify-content-around">
              <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-outline-dark my-2">Cancelar</a>
             
                <button type="submit" class="btn btn-dark my-2">Salvar</button>
              
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>



@stop
@section('css')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
@stop
