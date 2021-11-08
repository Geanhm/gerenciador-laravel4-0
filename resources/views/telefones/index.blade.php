@extends('layouts.app')

@section('cabecalho')
    Telefones de {{ $cliente->nome }}
@endsection

@section('conteudo')

    <a href="{{ route('form_criar_telefones',['id'=> $cliente->id]) }}" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach((array)$telefones as $telefone)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/telefones/{{ $telefone->id }}/telefones">
                telefone {{ $telefone->numero }}
            </a>
            </li>
        @endforeach
    </ul>
@endsection
