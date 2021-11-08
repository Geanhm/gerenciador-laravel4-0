<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnderecosFormRequest;
use App\Cliente;
use App\Endereco;
use App\Services\CriadorDeEndereco;
use Illuminate\Http\Request;

class EnderecosController extends Controller
{
    public function index(int $clienteId)
    {
        $cliente = Cliente::find($clienteId);
        $enderecos = $cliente->enderecos;

        return view(
            'enderecos.index',
            compact('cliente', 'enderecos')
        );
    }

    public function create($id, Request $request)
    {
        $cliente = Cliente::find($id);
        return view('enderecos.create', compact('cliente'));

    }

    public function store(
        EnderecosFormRequest $request,
        CriadorDeEndereco $criadorDeEndereco,
        int $clienteId
      ) {
        $criadorDeEndereco->criarendereco(
            $request->logradouro,
            $request->cep,
            $request->cliente_id

        );
        $cliente = Cliente::find($clienteId);
        $request->session()
            ->flash(
                'mensagem',
                "Endereço do cliente salvo com sucesso!"
            );

            return redirect('listar_enderecos', $cliente->id );

    }
}

