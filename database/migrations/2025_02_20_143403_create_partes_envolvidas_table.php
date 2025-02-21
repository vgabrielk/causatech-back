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
        Schema::create('partes_envolvidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('processo_id')->constrained('processos')->onDelete('cascade');
            $table->string('nome');
            $table->enum('tipo', ['Autor', 'Réu']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partes_envolvidas');
    }
};
