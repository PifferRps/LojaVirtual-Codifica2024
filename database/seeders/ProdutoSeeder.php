<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'categoria_id' => 1,
                'fornecedor_id' => 1,
                'sku' => 'ELEC12345',
                'nome' => 'Smartphone XYZ',
                'valor' => 1500.00,
                'valor_promocional' => 1350.00,
                'quantidade' => 100,
                'descricao' => 'Smartphone com tela AMOLED e 128GB de armazenamento.'
            ],
            [
                'categoria_id' => 2,
                'fornecedor_id' => 2,
                'sku' => 'VEST67890',
                'nome' => 'Camiseta Básica',
                'valor' => 50.00,
                'valor_promocional' => 45.00,
                'quantidade' => 200,
                'descricao' => 'Camiseta de algodão com várias cores disponíveis.'
            ],
            [
                'categoria_id' => 3,
                'fornecedor_id' => 3,
                'sku' => 'ALIM54321',
                'nome' => 'Pacote de Arroz 5kg',
                'valor' => 25.00,
                'valor_promocional' => null,
                'quantidade' => 300,
                'descricao' => 'Arroz tipo 1, ideal para o dia a dia.'
            ],
            [
                'categoria_id' => 4,
                'fornecedor_id' => 4,
                'sku' => 'LIVR11223',
                'nome' => 'Livro - Aprendendo PHP',
                'valor' => 80.00,
                'valor_promocional' => 72.00,
                'quantidade' => 50,
                'descricao' => 'Livro para iniciantes em programação PHP.'
            ],
            [
                'categoria_id' => 5,
                'fornecedor_id' => 5,
                'sku' => 'FERR33445',
                'nome' => 'Martelo de Aço',
                'valor' => 40.00,
                'valor_promocional' => 35.00,
                'quantidade' => 150,
                'descricao' => 'Martelo resistente para uso geral.'
            ],
            [
                'categoria_id' => 1,
                'fornecedor_id' => 1,
                'sku' => 'ELEC99887',
                'nome' => 'Fone de Ouvido Bluetooth',
                'valor' => 300.00,
                'valor_promocional' => 270.00,
                'quantidade' => 120,
                'descricao' => 'Fone de ouvido sem fio com cancelamento de ruído.'
            ],
            [
                'categoria_id' => 3,
                'fornecedor_id' => 3,
                'sku' => 'ALIM77665',
                'nome' => 'Pacote de Feijão 1kg',
                'valor' => 10.00,
                'valor_promocional' => null,
                'quantidade' => 500,
                'descricao' => 'Feijão carioca de alta qualidade.'
            ],
        ];

        foreach($data as $record){
            Produto::firstOrCreate(
                ['sku' => $record['sku']],
                $record
            );
        }
    }
}
