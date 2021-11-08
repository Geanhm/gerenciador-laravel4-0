@extends('layouts.app')

@section('cabecalho')
    Endereços de {{ $cliente->nome }}
@endsection
@section('conteudo')

    <a href="{{ route('form_criar_enderecos',['id'=> $cliente->id]) }}" class="btn btn-dark mb-2">Adicionar</a>


    <ul class="list-group">

            @foreach((array) $enderecos as $endereco)
            <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $endereco->logradouro }}

            </li>
        @endforeach
    </ul>
@endsection
