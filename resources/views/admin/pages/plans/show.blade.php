@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
    <h1>Detalhes do plano <b>{{$plan->name}}  <a href="{{ route('plans.index') }}" class="btn btn-success">Voltar</a></b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li><strong>Nome: </strong>{{$plan->name}}</li>
                <li><strong>URL: </strong>{{$plan->url}}</li>
                <li><strong>Preço: </strong>R$ {{number_format($plan->price, 2, ',', '.')}}</li>
                <li><strong>Descrição: </strong>{{$plan->description}}</li>
            </ul>

            <form action="{{ route('plans.destroy', $plan->url) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar Plano {{$plan->name}}</button>
            </form>

        </div>
    </div>
@endsection
