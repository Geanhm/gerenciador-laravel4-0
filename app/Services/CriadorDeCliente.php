<?php

namespace App\Services;

use App\Cliente;
use Illuminate\Support\Facades\DB;

class CriadorDeCliente
{
    public function criarCliente(
        string $nomecliente,
        int $cpf_cnpj
    ): Cliente {
        DB::beginTransaction();
        $cliente = Cliente::create(['nome' => $nomecliente,'cpf_cnpj' => $cpf_cnpj]);
        DB::commit();

        return $cliente;
    }

}
