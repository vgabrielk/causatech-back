<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->string('assunto');
            $table->date('data_inicio');
            $table->date('data_fim')->nullable();
            $table->enum('status', ['ANDAMENTO', 'FINALIZADO', 'SUSPENSO', 'AGUARDANDO_AUDIENCIA'])->default('ANDAMENTO');
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('advogado_id')->constrained('advogados')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('processos');
    }
};
