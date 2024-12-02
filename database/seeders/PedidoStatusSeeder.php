<?php

namespace Database\Seeders;

use App\Models\PedidoStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidoStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['status' => 'Efetuado'],
            ['status' => 'Aguardando pagamento'],
            ['status' => 'Cancelado'],
            ['status' => 'Aprovado'],
            ['status' => 'Em separação'],
            ['status' => 'Enviado'],
            ['status' => 'Entregue'],
            ['status' => 'Devolvido'],
            ['status' => 'Concluído']
        ];

        foreach($data as $record){
            PedidoStatus::firstOrCreate($record);
        }
    }
}
