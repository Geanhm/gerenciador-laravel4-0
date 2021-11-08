<?php

namespace App\Services;

use App\Endereco;
use Illuminate\Support\Facades\DB;

class CriadorDeEndereco
{
    public function criarEndereco(

        string $logradouro,
        int $cliente_id,
        int $cep

    ): Endereco {
        DB::beginTransaction();
        $endereco = Endereco::create(['cliente_id' => $cliente_id,'cep' => $cep, 'logradouro' => $logradouro]);
        DB::commit();

        return $endereco;
    }

}
