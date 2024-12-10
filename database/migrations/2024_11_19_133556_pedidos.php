<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->date('data_transacao');
            $table->foreignId('cliente_id')->constrained('usuarios_clientes');
            $table->foreignId('endereco_id')->constrained('clientes_enderecos');
            $table->foreignId('status_id')->constrained('pedidos_status');
            $table->float('valor_total', 10, 2);
            $table->float('desconto_total', 10, 2);
            $table->float('valor_final', 10, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
