<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ['pedido_id' => 1, 'produto_id' => 1, 'quantidade' => 2, 'produto_valor' => 1500.00, 'produto_valor_promocional' => 1350.00, 'valor_total_final' => 2700.00],
            ['pedido_id' => 1, 'produto_id' => 2, 'quantidade' => 3, 'produto_valor' => 50.00, 'produto_valor_promocional' => 45.00, 'valor_total_final' => 135.00],
            ['pedido_id' => 1, 'produto_id' => 3, 'quantidade' => 4, 'produto_valor' => 25.00, 'produto_valor_promocional' => null, 'valor_total_final' => 100.00],
            ['pedido_id' => 2, 'produto_id' => 4, 'quantidade' => 1, 'produto_valor' => 80.00, 'produto_valor_promocional' => 72.00, 'valor_total_final' => 72.00],
            ['pedido_id' => 2, 'produto_id' => 1, 'quantidade' => 1, 'produto_valor' => 1500.00, 'produto_valor_promocional' => 1350.00, 'valor_total_final' => 1350.00],
            ['pedido_id' => 3, 'produto_id' => 6, 'quantidade' => 2, 'produto_valor' => 300.00, 'produto_valor_promocional' => 270.00, 'valor_total_final' => 540.00],
            ['pedido_id' => 3, 'produto_id' => 5, 'quantidade' => 1, 'produto_valor' => 40.00, 'produto_valor_promocional' => 35.00, 'valor_total_final' => 35.00],
            ['pedido_id' => 4, 'produto_id' => 3, 'quantidade' => 5, 'produto_valor' => 25.00, 'produto_valor_promocional' => null, 'valor_total_final' => 125.00],
            ['pedido_id' => 4, 'produto_id' => 7, 'quantidade' => 1, 'produto_valor' => 10.00, 'produto_valor_promocional' => null, 'valor_total_final' => 10.00],
            ['pedido_id' => 5, 'produto_id' => 2, 'quantidade' => 2, 'produto_valor' => 50.00, 'produto_valor_promocional' => 45.00, 'valor_total_final' => 90.00],
            ['pedido_id' => 5, 'produto_id' => 1, 'quantidade' => 3, 'produto_valor' => 1500.00, 'produto_valor_promocional' => 1350.00, 'valor_total_final' => 4050.00],
            ['pedido_id' => 1, 'produto_id' => 6, 'quantidade' => 2, 'produto_valor' => 300.00, 'produto_valor_promocional' => 270.00, 'valor_total_final' => 540.00],
            ['pedido_id' => 2, 'produto_id' => 5, 'quantidade' => 4, 'produto_valor' => 40.00, 'produto_valor_promocional' => 35.00, 'valor_total_final' => 140.00],
            ['pedido_id' => 3, 'produto_id' => 4, 'quantidade' => 2, 'produto_valor' => 80.00, 'produto_valor_promocional' => 72.00, 'valor_total_final' => 144.00],
            ['pedido_id' => 4, 'produto_id' => 2, 'quantidade' => 5, 'produto_valor' => 50.00, 'produto_valor_promocional' => 45.00, 'valor_total_final' => 225.00],
            ['pedido_id' => 5, 'produto_id' => 3, 'quantidade' => 6, 'produto_valor' => 25.00, 'produto_valor_promocional' => null, 'valor_total_final' => 150.00],
            ['pedido_id' => 5, 'produto_id' => 6, 'quantidade' => 3, 'produto_valor' => 300.00, 'produto_valor_promocional' => 270.00, 'valor_total_final' => 810.00],
            ['pedido_id' => 3, 'produto_id' => 7, 'quantidade' => 2, 'produto_valor' => 10.00, 'produto_valor_promocional' => null, 'valor_total_final' => 20.00],
            ['pedido_id' => 2, 'produto_id' => 1, 'quantidade' => 1, 'produto_valor' => 1500.00, 'produto_valor_promocional' => 1350.00, 'valor_total_final' => 1350.00],
            ['pedido_id' => 4, 'produto_id' => 5, 'quantidade' => 3, 'produto_valor' => 40.00, 'produto_valor_promocional' => 35.00, 'valor_total_final' => 105.00],
        ]);

    }
}
