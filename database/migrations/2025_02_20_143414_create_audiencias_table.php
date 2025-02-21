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
        Schema::create('audiencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('processo_id')->constrained('processos')->onDelete('cascade');
            $table->dateTime('data_audiencia');
            $table->string('local');
            $table->string('status')->default('Agendada');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('audiencias');
    }
};
