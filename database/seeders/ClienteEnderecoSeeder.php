<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteEnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes_enderecos')->insert([
            [
                'cliente_id' => 1,
                'cep' => '60766115',
                'rua' => 'Rua Alberto Sales',
                'numero' => '222',
                'bairro' => 'Planalto Ayrton Senna',
                'cidade' => 'Fortaleza',
                'estado' => 'CE'
            ],
            [
                'cliente_id' => 2,
                'cep' => '74415460',
                'rua' => 'Praça Ofélia Nascimento',
                'numero' => '333',
                'bairro' => 'Cidade Jardim',
                'cidade' => 'Goiânia',
                'estado' => 'GO'
            ]
        ]);
    }
}
