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
    Schema::create('viagens', function (Blueprint $table) {
        $table->id();
        
        $table->unsignedBigInteger('veiculo_id');
        $table->foreign('veiculo_id')->references('id')->on('veiculos')->onDelete('cascade');
        
        $table->unsignedBigInteger('motorista_id');
        $table->foreign('motorista_id')->references('id')->on('motoristas')->onDelete('cascade');
        
        $table->bigInteger('km_inicial');
        $table->bigInteger('km_final')->nullable(); // atualizado depois que a viagem termina
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viagens');
    }
};
