<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'nome' => 'Cliente Teste',
                'cpf' => '11111111111',
                'telefone' => '27996688777',
                'data_nascimento' => Carbon::parse('31-01-2000')->format('Y-m-d')
            ]
        ]);
    }
}
