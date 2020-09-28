<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{

    protected $table = 'empresas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable  = ['id',
                            'cnpj',
                            'matriz',
                            'razao_social',
                            'nome_fantasia',
                            'situacao',
                            'data_cadastral',
                            'motivo_cadastral',
                            'nome_cidade_exterior',
                            'cod_pais',
                            'nome_pais',
                            'cod_natureza_juridica',
                            'data_inicio_atividade',
                            'cnae_fiscal',
                            'tipo_logradouro',
                            'logradouro',
                            'numero',
                            'complemento',
                            'bairro',
                            'cep',
                            'uf',
                            'cod_municipio',
                            'municipio',
                            'ddd_telfeone1',
                            'telefone1_celular',
                            'ddd_telefone2',
                            'telefone1_celula2',
                            'ddd_fax',
                            'correio_eletronico',
                            'qualif_responsavel',
                            'capital_social',
                            'porte_empresa', 
                            'opcao_simples', 
                            'data_opcao_simples',
                            'data_exclusao_simples',
                            'opcao_mei', 
                            'sit_espcial', 
                            'data_sit_especial',
                            'socios',
                            'cnaes_secundarios'];
}
