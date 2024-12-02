<?php

namespace Database\Seeders;

use App\Models\ProdutoCategoria;
use Illuminate\Database\Seeder;


class ProdutoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nome' => 'Eletrônicos'],
            ['nome' => 'Vestuário'],
            ['nome' => 'Alimentos'],
            ['nome' => 'Livros'],
            ['nome' => 'Ferramentas']
        ];

        foreach($data as $record){
            ProdutoCategoria::firstOrCreate(
                ['nome' => $record['nome']],
                $record
            );
        }
    }
}
