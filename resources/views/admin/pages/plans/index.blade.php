@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"></a>Dashboard</li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}" class="active">Planos</a></li>
    </ol>
    <div class="w3-container">
        <div class="row justify-content-md-between">
            <h1>Planos &nbsp;&nbsp; <a href="{{ route('plans.create') }}" class="btn btn-dark"><i
                        class="fa fa-plus-square"></i>&nbsp; Adicionar</a></h1>
            <form action="{{ route('plans.search') }}" class="form form-inline" method="POST">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control"
                    value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Buscar</button>
            </form>
        </div>
    </div>

@stop

@section('content')
    <div class="w3-card-4">
        @if ($plans->count())
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="w3-dark-gray">
                        <tr class="w3-center">
                            <th width="50%">Nome</th>
                            <th width="30%">Preço</th>

                            <th width="20%">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plans as $plan)
                            <tr class="text-bold">
                                <td>{{ $plan->name }}</td>
                                <th>{{ number_format($plan->price, '2', ',', '.') }}</th>

                                <td class="w3-center">
                                    <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-info"><i class="fas fa-list-alt"></i></a>

                                    <a href="{{ route('plans.edit', $plan->url) }}" class="w3-button w3-white w3-border w3-border-dark-gray w3-text-orange
                                             w3-round-large w3-hover-orange"><i class="fas fa-pen-alt"></i></a>
                                    <a href="{{ route('plans.show', $plan->url) }}" class="w3-button w3-white w3-border w3-border-dark-gray w3-text-indigo
                                            w3-round-large w3-hover-indigo"><i class="fas fa-eye"></i></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
@else
    <div class="w3-container w3-dark-gray" py-3>
        <h5>Nenhum registro encontrado</h5>
    </div>
    @endif

    <div class="card-footer">
        @if (isset($filters))
            {{ $plans->appends($filters)->links() }}
        @else
            {{ $plans->links() }}
        @endif

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
