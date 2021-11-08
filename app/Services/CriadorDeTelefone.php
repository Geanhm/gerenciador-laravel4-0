<?php

namespace App\Services;

use App\Telefone;
use Illuminate\Support\Facades\DB;

class CriadorDeTelefone
{
    public function criarTelefone(
        int $cliente_id,
        int $telefone

    ): Cliente {
        DB::beginTransaction();
        $telefone = Telefone::create(['cliente_id' => $cliente_id,'telefone' => $telefone]);
        DB::commit();

        return $telefone;
    }

}
