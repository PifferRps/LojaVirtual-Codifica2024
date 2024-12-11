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
            $table->foreignId('categoria_id')->constrained('produtos_categorias');
            $table->string('sku')->unique();
            $table->string('nome');
            $table->float('valor', 10,2);
            $table->integer('quantidade');
            $table->string('imagem_1')->nullable();
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
