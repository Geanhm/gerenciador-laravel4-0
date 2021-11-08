<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    public $timestamps = false;
    protected $fillable = ['cliente_id', 'cep', 'logradouro'];
    /**public function clientes()
    {
        $this->belongsTo(Cliente::class);
    }
     */
}
