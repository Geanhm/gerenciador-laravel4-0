<?php
namespace App\Services;

use App\{Cliente, Endereco, Telefone};
use Illuminate\Support\Facades\DB;

class RemovedorDeCliente
{
    public function removercliente(int $clienteId): string
    {
        $nomecliente = '';
        DB::transaction(function () use ($clienteId, &$nomecliente) {
            $cliente = cliente::find($clienteId);
            $nomecliente = $cliente->nome;

            $this->removerenderecos($cliente);
            $this->removertelefones($cliente);
            $cliente->delete();
        });

        return $nomecliente;
    }

    private function removerenderecos(cliente $cliente): void
    {
        if(empty($cliente->enderecos)){

        }else {
            $cliente->enderecos->each(function (endereco $endereco) {
                $endereco->delete();
            });
        }
    }

    private function removertelefones(cliente $cliente): void
    {
        if(empty($cliente->enderecos)){

        }else {
            $cliente->telefones->each(function (telefone $telefone) {
                $telefone->delete();
            });
        }
    }
}

