<?php

namespace Database\Seeders;

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
                'cep' => '64078217',
                'rua' => 'Rua Deputado Antonio Gayoso',
                'numero' => '111',
                'bairro' => 'Itararé',
                'cidade' => 'Teresina',
                'estado' => 'PI'
            ],
            [
                'cliente_id' => 2,
                'cep' => '65915822',
                'rua' => 'Rua Rui Barbosa',
                'numero' => '222',
                'bairro' => 'Parque Alvorada II',
                'cidade' => 'Imperatriz',
                'estado' => 'MA'
            ],
            [
                'cliente_id' => 3,
                'cep' => '36302540',
                'rua' => 'Rua São Pedro',
                'numero' => '333',
                'bairro' => 'Colônia do Marçal',
                'cidade' => 'São João Del Rei',
                'estado' => 'MG'
            ]
        ]);
    }
}
