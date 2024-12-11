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
                'pedido_id' => 1001,
                'produto_id' => 5,
                'quantidade_vendida' => 2,
            ],
            [
                'pedido_id' => 1001,
                'produto_id' => 8,
                'quantidade_vendida' => 1,
            ],
            [
                'pedido_id' => 1002,
                'produto_id' => 3,
                'quantidade_vendida' => 2,
            ],
            [
                'pedido_id' => 1003,
                'produto_id' => 10,
                'quantidade_vendida' => 2,
            ],
            [
                'pedido_id' => 1004,
                'produto_id' => 12,
                'quantidade_vendida' => 2,
            ],
            [
                'pedido_id' => 1005,
                'produto_id' => 7,
                'quantidade_vendida' => 2,
            ],
            [
                'pedido_id' => 1006,
                'produto_id' => 15,
                'quantidade_vendida' => 2,
            ],
            [
                'pedido_id' => 1007,
                'produto_id' => 3,
                'quantidade_vendida' => 2,
            ],
            [
                'pedido_id' => 1008,
                'produto_id' => 10,
                'quantidade_vendida' => 1,
            ],
            [
                'pedido_id' => 1009,
                'produto_id' => 15,
                'quantidade_vendida' => 5,
            ],
            [
                'pedido_id' => 1010,
                'produto_id' => 2,
                'quantidade_vendida' => 2,
            ],
            [
                'pedido_id' => 1011,
                'produto_id' => 5,
                'quantidade_vendida' => 2,
            ],
            [
                'pedido_id' => 1012,
                'produto_id' => 3,
                'quantidade_vendida' => 3,
            ],
            [
                'pedido_id' => 1013,
                'produto_id' => 7,
                'quantidade_vendida' => 1,
            ],
            [
                'pedido_id' => 1014,
                'produto_id' => 9,
                'quantidade_vendida' => 1,
            ],
            [
                'pedido_id' => 1015,
                'produto_id' => 4,
                'quantidade_vendida' => 3,
            ]
        ]);

    }
}
