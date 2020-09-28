<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mei', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->float('valor_declarado', 10, 2);
            $table->char('tem_empregado',1);
            $table->integer('ano_declarar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mei');
    }
}
