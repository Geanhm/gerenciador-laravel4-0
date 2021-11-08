<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    public $timestamps = false;
    protected $fillable = ['cliente_id', 'telefone'];
    /**
    public function clientes()
    {
        $this->belongsTo(Cliente::class);
    }
     */
}
