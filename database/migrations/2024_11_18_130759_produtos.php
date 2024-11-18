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
            $table->string('sku');
            $table->string('nome');
            $table->float('valor');
            $table->float('valor_promocional')->nullable();
            $table->bigInteger('quantidade');
            $table->string('imagem_1');
            $table->string('imagem_2')->nullable();
            $table->string('imagem_3')->nullable();
            $table->string('imagem_4')->nullable();
            $table->string('descricao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
