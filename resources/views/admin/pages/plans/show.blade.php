@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    
    <div class="w3-container">
        <div class="row justify-content-md-between">
            <h1>Detalhes do Plano: &nbsp;{{ $plan->name }} </h1>
            
        </div>
    </div>

@stop

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="w3-card-4">
      <header class="w3-dark-gray p-3"><h2>Plano: {{ $plan->name }}</h2></header>
        
      <ul class="mt-3">
        <li><strong>Nome:</strong> {{ $plan->name }}</li><br>
        <li><strong>Preço:</strong> {{ $plan->price }}</li><br>
        <li><strong>Descrição:</strong> {{ $plan->description }}</li><br>
      </ul>

      <footer>
        <div class="row justify-content-around py-2">
          <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="w3-button w3-red">
              <i class="fas fa-trash-alt"></i>&nbsp;&nbsp; Excluir: {{ $plan->name }}?</button>
          </form>
          <a href="{{ route('plans.edit', $plan->url) }}"
              class="w3-button w3-indigo"><i class="fas fa-pen-alt"></i> Editar</a>
          <a href="{{ route('plans.index', $plan->url) }}"
              class="w3-button w3-dark-gray"><i class="fas fa-angle-double-left"></i> Voltar</a>
        </div>
      </footer>

    </div>
  </div>
</div>
    
@stop

@section('css')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{ asset('css/w3.css') }}">

@stop

@section('js')

    @include('admin.includes.toastr')

@stop
