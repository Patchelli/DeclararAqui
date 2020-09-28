<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDdEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->string('endereco', 250)->default(null);
            $table->string('numero', 15)->default(null);
            $table->string('cep', 15)->default(null);
            $table->string('cidade', 200)->default(null);
            $table->string('uf', 10)->default(null);
            $table->string('bairro', 200)->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            //
        });
    }
}
