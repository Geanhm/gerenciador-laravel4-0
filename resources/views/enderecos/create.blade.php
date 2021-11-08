@extends('layouts.app')

@section('cabecalho')
    Adicionar Endereço para  {{ $cliente->nome }} {{ $cliente->id }}
@endsection

@section('conteudo')

<form method="post">
    @csrf
    <div class="row">
        <div class="col col-8">
            <label for="logradouro">Logradouro</label>
            <input type="text" class="form-control" name="logradouro" id="logradouro">
        </div>

        <div class="col col-2">
            <label for="cep">CEP</label>
            <input type="number" class="form-control" name="cep" id="cep">
        </div>

        <div class="col col-2">
            <label for="cliente_id">ID</label>
            <input disabled type="number" class="form-control" name="cliente_id" id="cliente_id" value={{$cliente->id}}>
        </div>
    </div>

    <button class="btn btn-primary mt-2">Adicionar</button>

</form>
@endsection
