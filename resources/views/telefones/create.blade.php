@extends('layouts.app')

@section('cabecalho')
    Adicionar Telefone para  {{ $cliente->nome }} {{ $cliente->id }}
@endsection

@section('conteudo')

    <form method="post">
        @csrf
        <div class="row">
            <div class="col col-4">
                <label for="telefone">Telefone</label>
                <input type="number" class="form-control" name="telefone" id="telefone">
            </div>

            <div class="col col-2">
                <label for="cliente_id">ID</label>
                <input type="number" class="form-control" name="cliente_id" id="cliente_id"  value={{$cliente->id}} >
            </div>
        </div>

        <button class="btn btn-primary mt-2">Adicionar</button>

    </form>
@endsection
