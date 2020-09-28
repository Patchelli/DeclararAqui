<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mei extends Model
{
    protected $table = 'mei';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cliente_id', 'valor_declarado', 'tem_empregado','ano_declarar','valor_servicos','pago','retorno_pagamento',
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
}
