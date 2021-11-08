@extends('layouts.app')

@section('cabecalho')
Clientes
@endsection

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

<a href="{{ route('form_criar_cliente') }}" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    @foreach($clientes as $cliente)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $cliente->nome }}

        <span class="d-flex">
            <a href="/clientes/{{ $cliente->id }}/telefones" class="btn btn-success btn-sm mr-1">
                <i class="fas fa-phone"></i>
            </a>
            <a href="/clientes/{{ $cliente->id }}/enderecos" class="btn btn-info btn-sm mr-1">
                <i class="fas fa-address-book"></i>
            </a>
            <form method="post" action="/clientes/{{ $cliente->id }}"
                  onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($cliente->nome) }}?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
        </span>
    </li>
    @endforeach
</ul>
@endsection
