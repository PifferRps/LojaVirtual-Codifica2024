<?php

namespace Database\Seeders;

use App\Models\FormaPagamento;
use Illuminate\Database\Seeder;

class FormaPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nome' => 'PIX'],
            ['nome' => 'Boleto Bancário'],
            ['nome' => 'Cartão de Crédito'],
        ];

        foreach($data as $record){
            FormaPagamento::firstOrCreate($record);
        }
    }
}
