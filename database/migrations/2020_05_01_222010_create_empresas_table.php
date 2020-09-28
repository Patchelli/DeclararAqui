<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->timestamps();
            $table->string('id',50);
            $table->string('cnpj',250);
            $table->string('matriz',250);
            $table->string('razao_social',250);
            $table->string('nome_fantasia',250);
            $table->string('situacao',250);
            $table->string('data_cadastral',250);
            $table->string('motivo_cadastral',250);
            $table->string('nome_cidade_exterior',250);
            $table->string('cod_pais',250);
            $table->string('nome_pais',250);
            $table->string('cod_natureza_juridica',250);
            $table->string('data_inicio_atividade',250);
            $table->string('cnae_fiscal',250);
            $table->string('tipo_logradouro',250);
            $table->string('logradouro',250);
            $table->string('numero',250);
            $table->string('complemento',250);
            $table->string('bairro',250);
            $table->string('cep',15);
            $table->string('uf',50);
            $table->string('cod_municipio',50);
            $table->string('municipio',250);
            $table->string('ddd_telfeone1',20);
            $table->string('telefone1_celular',20);
            $table->string('ddd_telefone2',20);
            $table->string('telefone1_celula2',20);
            $table->string('ddd_fax',20);
            $table->string('correio_eletronico',250);
            $table->string('qualif_responsavel',250);
            $table->string('capital_social',250);
            $table->string('porte_empresa',250); 
            $table->string('opcao_simples',250); 
            $table->string('data_opcao_simples',250);
            $table->string('data_exclusao_simples',250);
            $table->string('opcao_mei',250); 
            $table->string('sit_espcial',250); 
            $table->string('data_sit_especial',250);
            $table->string('socios',250);
            $table->string('cnaes_secundarios',250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
