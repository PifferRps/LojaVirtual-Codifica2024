<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pedidos')->insert([
            [
                'data_transacao' => Carbon::parse('31-11-2024')->format('Y-m-d'),
                'cliente_id' => 1,
                'endereco_id' => 1,
                'status_id' => 1,
                'valor_total' => 2350.00,
                'desconto_total' => 200.00,
                'valor_final' => 2150.00,
            ],
            [
                'data_transacao' => Carbon::parse('31-11-2024')->format('Y-m-d'),
                'cliente_id' => 1,
                'endereco_id' => 1,
                'status_id' => 2,
                'valor_total' => 1500.00,
                'desconto_total' => 100.00,
                'valor_final' => 1400.00,
            ],
            [
                'data_transacao' => Carbon::parse('28-11-2024')->format('Y-m-d'),
                'cliente_id' => 1,
                'endereco_id' => 1,
                'status_id' => 3,
                'valor_total' => 1250.00,
                'desconto_total' => 50.00,
                'valor_final' => 1200.00,
            ],
            [
                'data_transacao' => Carbon::parse('01-12-2024')->format('Y-m-d'),
                'cliente_id' => 1,
                'endereco_id' => 1,
                'status_id' => 1,
                'valor_total' => 1800.00,
                'desconto_total' => 200.00,
                'valor_final' => 1600.00,
            ],
            [
                'data_transacao' => Carbon::parse('03-12-2024')->format('Y-m-d'),
                'cliente_id' => 1,
                'endereco_id' => 1,
                'status_id' => 9,
                'valor_total' => 1300.00,
                'desconto_total' => 100.00,
                'valor_final' => 1200.00,
            ],
        ]);
    }
}
