@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    
    <div class="w3-container">
        <div class="row justify-content-between">
            <h1>Detalhes do Plano: &nbsp;&nbsp; {{ $plan->name }} 
              <a href="{{ route('details.plan.create', $plan->url) }}" class="btn btn-dark"><i
                        class="fa fa-plus-square"></i>&nbsp; Adicionar</a></h1>
        </div>
    </div>

@stop

@section('content')
    <div class="w3-card-4">
        @if ($details->count())
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="w3-dark-gray">
                        <tr class="w3-center">
                            <th width="80%">Nome</th>
                            <th width="20%">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $detail)
                            <tr class="text-bold">
                                <td>{{ $detail->name }}</td>
                                

                                <td class="w3-center">
                                    <a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="w3-button w3-white w3-border w3-border-dark-gray w3-text-orange
                                             w3-round-large w3-hover-orange"><i class="fas fa-pen-alt"></i></a>
                                    <a href="{{ route('details.plan.show', [$plan->url, $detail->id]) }}" class="w3-button w3-white w3-border w3-border-dark-gray w3-text-indigo
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
            {{ $details->appends($filters)->links() }}
        @else
            {{ $details->links() }}
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
