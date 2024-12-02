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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('categoria_id');
            $table->bigInteger('fornecedor_id');
            $table->string('sku')->unique();
            $table->string('nome')->index();
            $table->float('valor', 10,2);
            $table->float('valor_promocional', 10,2)->nullable();
            $table->float('quantidade', 10,2);
            $table->string('imagem_1')->nullable();
            $table->string('imagem_2')->nullable();
            $table->string('imagem_3')->nullable();
            $table->string('imagem_4')->nullable();
            $table->text('descricao');
            $table->timestamps();
            $table->softDeletes();
     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('produtos');
    }
};
