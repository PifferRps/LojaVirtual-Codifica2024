<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProdutoCategoriaSeeder::class,
            ProdutoSeeder::class,
            UsuarioSeeder::class,
            UsuarioClienteSeeder::class,
            ClienteEnderecoSeeder::class,
            FormaPagamentoSeeder::class,
            PedidoStatusSeeder::class,
            PedidoSeeder::class,
            PedidoProdutoSeeder::class
        ]);
    }
}
