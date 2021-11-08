<?php

namespace App\Http\Controllers;

use App\Http\Requests\clientesFormRequest;
use App\Cliente;
use App\Telefone;
use App\Endereco;
use App\Services\CriadorDeCliente;
use App\Services\RemovedorDeCliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index(Request $request) {
        $clientes = cliente::query()
            ->orderBy('nome')
            ->get();
        $mensagem = $request->session()->get('mensagem');

        return view('clientes.index', compact('clientes', 'mensagem'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(
        ClientesFormRequest $request,
        CriadorDeCliente $criadorDeCliente
    ) {
        $cliente = $criadorDeCliente->criarcliente(
            $request->nome,
            $request->cpf_cnpj
        );

        $request->session()
            ->flash(
                'mensagem',
                "Cliente {$cliente->nome}, ID:{$cliente->id} salvo com sucesso!"
            );

        return redirect()->route('listar_clientes');
    }

    public function destroy(Request $request, RemovedorDeCliente $removedorDeCliente)
    {
        $nomeCliente = $removedorDeCliente->removerCliente($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Cliente $nomeCliente exclúido com sucesso"
            );
        return redirect()->route('listar_clientes');
    }
}
