<?php

use App\Models\UsuarioCliente;
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
        Schema::create('clientes_enderecos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('usuarios_clientes');
            $table->string('cep');
            $table->string('rua');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->string('complemento')->nullable();
            $table->string('referencia')->nullable();
            $table->float('valor_frete', 2, 10)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes_enderecos');
    }
};
