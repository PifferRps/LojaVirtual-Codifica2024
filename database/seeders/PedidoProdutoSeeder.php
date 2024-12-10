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
                'produto_valor' => 500.00,
                'quantidade' => 2,
                'valor_total' => 1000.00,
            ],
            [
                'pedido_id' => 1,
                'produto_id' => 8,
                'produto_valor' => 500.00,
                'quantidade' => 1,
                'valor_total' => 500.00,
            ],
            [
                'pedido_id' => 2,
                'produto_id' => 3,
                'produto_valor' => 1500.00,
                'quantidade' => 2,
                'valor_total' => 3000.00,
            ],
            [
                'pedido_id' => 3,
                'produto_id' => 10,
                'produto_valor' => 600.00,
                'quantidade' => 2,
                'valor_total' => 1200.00,
            ],
            [
                'pedido_id' => 4,
                'produto_id' => 12,
                'produto_valor' => 1250.00,
                'quantidade' => 2,
                'valor_total' => 2500.00,
            ],
            [
                'pedido_id' => 5,
                'produto_id' => 7,
                'produto_valor' => 875.00,
                'quantidade' => 2,
                'valor_total' => 1750.00,
            ],
            [
                'pedido_id' => 6,
                'produto_id' => 15,
                'produto_valor' => 400.00,
                'quantidade' => 2,
                'valor_total' => 800.00,
            ],
            [
                'pedido_id' => 7,
                'produto_id' => 3,
                'produto_valor' => 1600.00,
                'quantidade' => 2,
                'valor_total' => 3200.00,
            ],
            [
                'pedido_id' => 8,
                'produto_id' => 10,
                'produto_valor' => 1500.00,
                'quantidade' => 1,
                'valor_total' => 1500.00,
            ],
            [
                'pedido_id' => 9,
                'produto_id' => 15,
                'produto_valor' => 1200.00,
                'quantidade' => 5,
                'valor_total' => 6000.00,
            ],
            [
                'pedido_id' => 10,
                'produto_id' => 2,
                'produto_valor' => 1100.00,
                'quantidade' => 2,
                'valor_total' => 2200.00,
            ],
            [
                'pedido_id' => 11,
                'produto_id' => 5,
                'produto_valor' => 1750.00,
                'quantidade' => 2,
                'valor_total' => 3500.00,
            ],
            [
                'pedido_id' => 12,
                'produto_id' => 3,
                'produto_valor' => 900.00,
                'quantidade' => 3,
                'valor_total' => 2700.00,
            ],
            [
                'pedido_id' => 13,
                'produto_id' => 7,
                'produto_valor' => 1000.00,
                'quantidade' => 1,
                'valor_total' => 1000.00,
            ],
            [
                'pedido_id' => 14,
                'produto_id' => 9,
                'produto_valor' => 1250.00,
                'quantidade' => 1,
                'valor_total' => 1250.00,
            ],
            [
                'pedido_id' => 15,
                'produto_id' => 4,
                'produto_valor' => 1500.00,
                'quantidade' => 3,
                'valor_total' => 4500.00,
            ]
        ]);

    }
}
