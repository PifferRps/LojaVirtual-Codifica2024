<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidoProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pedidos_produtos')->insert([
            [
                'pedido_id' => 1,
                'produto_id' => 5,
                'quantidade_vendida' => 2,
            ],
            [
                'pedido_id' => 1,
                'produto_id' => 8,
                'quantidade_vendida' => 1,
            ],
            [
                'pedido_id' => 2,
                'produto_id' => 3,
                'quantidade_vendida' => 2,
            ],
            [
                'pedido_id' => 3,
                'produto_id' => 10,
                'quantidade_vendida' => 2,
            ],
            [
                'pedido_id' => 4,
                'produto_id' => 12,
                'quantidade_vendida' => 2,
            ],
            [
                'pedido_id' => 5,
                'produto_id' => 7,
                'quantidade_vendida' => 2,
            ],
            [
                'pedido_id' => 6,
                'produto_id' => 15,
                'quantidade_vendida' => 2,
            ],
            [
                'pedido_id' => 7,
                'produto_id' => 3,
                'quantidade_vendida' => 2,
            ],
            [
                'pedido_id' => 8,
                'produto_id' => 10,
                'quantidade_vendida' => 1,
            ],
            [
                'pedido_id' => 9,
                'produto_id' => 15,
                'quantidade_vendida' => 5,
            ],
            [
                'pedido_id' => 10,
                'produto_id' => 2,
                'quantidade_vendida' => 2,
            ],
            [
                'pedido_id' => 11,
                'produto_id' => 5,
                'quantidade_vendida' => 2,
            ],
            [
                'pedido_id' => 12,
                'produto_id' => 3,
                'quantidade_vendida' => 3,
            ],
            [
                'pedido_id' => 13,
                'produto_id' => 7,
                'quantidade_vendida' => 1,
            ],
            [
                'pedido_id' => 14,
                'produto_id' => 9,
                'quantidade_vendida' => 1,
            ],
            [
                'pedido_id' => 15,
                'produto_id' => 4,
                'quantidade_vendida' => 3,
            ]
        ]);

    }
}
