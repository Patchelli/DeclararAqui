<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'telefone', 'cnpj', 'cpf', 'data_nasc','endereco','numero','cep','cidade','uf','bairro'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function mei()
    {
        return $this->hasOne('App\Mei');
    }
}
