<?php

namespace Database\Seeders;

use App\Enums\PedidoStatus;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ProdutoFornecedorSeeder::class,
            ProdutoSeeder::class,
            UsuarioSeeder::class,
            UsuarioClienteSeeder::class,
            ClienteEnderecoSeeder::class,
            PedidoStatusSeeder::class,
            PedidoSeeder::class,
            PedidoProdutoSeeder::class
        ]);
    }
}
