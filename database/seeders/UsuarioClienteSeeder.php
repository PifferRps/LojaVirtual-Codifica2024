<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios_clientes')->insert([
            [
                'usuario_id' => 2,
                'nome' => 'Cliente',
                'cpf' => '11111111111',
                'telefone' => '27999991111',
                'data_nascimento' => Carbon::parse('31-01-2000')->format('Y-m-d')
            ],
            [
                'usuario_id' => 3,
                'nome' => 'Cliente 2',
                'cpf' => '22222222222',
                'telefone' => '27999992222',
                'data_nascimento' => Carbon::parse('31-01-2000')->format('Y-m-d')
            ],
            [
                'usuario_id' => 4,
                'nome' => 'Cliente 3',
                'cpf' => '33333333333',
                'telefone' => '27999993333',
                'data_nascimento' => Carbon::parse('31-01-2000')->format('Y-m-d')
            ]
        ]);
    }
}
