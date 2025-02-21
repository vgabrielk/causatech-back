<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvogadosTable extends Migration
{
    public function up()
    {
        Schema::create('advogados', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('oab')->unique(); // Número da OAB (Ordem dos Advogados do Brasil)
            $table->string('estado_oab'); // Estado de registro da OAB
            $table->string('email')->unique()->nullable();
            $table->string('telefone')->nullable();
            $table->string('endereco')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('advogados');
    }
}
