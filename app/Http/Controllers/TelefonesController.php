<?php

namespace App\Http\Controllers;

use App\Http\Requests\TelefonesFormRequest;
use App\Cliente;
use App\Telefone;
use App\Services\CriadorDeTelefone;
use Illuminate\Http\Request;

class TelefonesController extends Controller
{
    public function index(int $clienteId)
    {
        $cliente = Cliente::find($clienteId);
        $telefones = $cliente->telefones;

        return view(
            'Telefones.index',
            compact('cliente', 'telefones')
        );
    }

   public function create($id, Request $request)
    {
        $cliente = Cliente::find($id);
        return view('telefones.create', compact('cliente'));

    }


    public function store(
        TelefonesFormRequest $request,
        CriadorDeTelefone $criadorDeTelefone
    ) {
        $criadorDeTelefone->criartelefone(
        $request->cliente_id,
        $request->telefone

        );
        $cliente = Cliente::find($clienteId);
        $request->session()
            ->flash(
                'mensagem',
                "Telefone do cliente {$cliente->nome} salvo com sucesso!"
            );

        return redirect('listar_telefones', $cliente->id );

    }
}

