<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoFornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produtos_fornecedores')->insert([
            ['razao_social' => 'Tech Supplies LTDA'],
            ['razao_social' => 'Moda e Estilo SA'],
            ['razao_social' => 'Alimentos Frescos LTDA'],
            ['razao_social' => 'Editora Saber LTDA'],
            ['razao_social' => 'Ferramentas Pro SA']
        ]);
    }
}
