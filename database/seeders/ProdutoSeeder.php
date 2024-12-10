<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;

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
                'sku' => 'HARDW001',
                'nome' => 'Placa Mãe ABC-X1',
                'valor' => 899.90,
                'quantidade' => 50,
                'descricao' => 'Placa mãe com suporte para processadores de última geração.'
            ],
            [
                'categoria_id' => 1,
                'sku' => 'HARDW002',
                'nome' => 'Processador X-Core 5',
                'valor' => 1200.00,
                'quantidade' => 30,
                'descricao' => 'Processador de alto desempenho com 6 núcleos e 12 threads.'
            ],
            [
                'categoria_id' => 1,
                'sku' => 'HARDW003',
                'nome' => 'Memória RAM 16GB DDR4',
                'valor' => 450.00,
                'quantidade' => 70,
                'descricao' => 'Memória RAM de alta velocidade ideal para multitarefas.'
            ],
            [
                'categoria_id' => 2,
                'sku' => 'MOUS001',
                'nome' => 'Mouse Codifica X154',
                'valor' => 150.00,
                'quantidade' => 100,
                'descricao' => 'Mouse com 3000 DPI perfeito para trabalho e jogos.'
            ],
            [
                'categoria_id' => 2,
                'sku' => 'MOUS002',
                'nome' => 'Mouse RGB Extreme',
                'valor' => 200.00,
                'quantidade' => 80,
                'descricao' => 'Mouse gamer com iluminação RGB personalizável.'
            ],
            [
                'categoria_id' => 2,
                'sku' => 'MOUS003',
                'nome' => 'Mouse sem Fio Compact',
                'valor' => 99.90,
                'quantidade' => 120,
                'descricao' => 'Mouse sem fio com design ergonômico.'
            ],
            [
                'categoria_id' => 3,
                'sku' => 'TECL001',
                'nome' => 'Teclado Mecânico Pro Gamer',
                'valor' => 320.00,
                'quantidade' => 40,
                'descricao' => 'Teclado mecânico com switches azuis e iluminação RGB.'
            ],
            [
                'categoria_id' => 3,
                'sku' => 'TECL002',
                'nome' => 'Teclado Slim Office',
                'valor' => 120.00,
                'quantidade' => 90,
                'descricao' => 'Teclado compacto e silencioso para uso em escritório.'
            ],
            [
                'categoria_id' => 3,
                'sku' => 'TECL003',
                'nome' => 'Teclado Gamer com Macro',
                'valor' => 280.00,
                'quantidade' => 60,
                'descricao' => 'Teclado com teclas macro programáveis e iluminação RGB.'
            ],
            [
                'categoria_id' => 4,
                'sku' => 'MONI001',
                'nome' => 'Monitor Full HD 24"',
                'valor' => 800.00,
                'quantidade' => 50,
                'descricao' => 'Monitor com resolução Full HD e taxa de atualização de 75Hz.'
            ],
            [
                'categoria_id' => 4,
                'sku' => 'MONI002',
                'nome' => 'Monitor Ultrawide 34"',
                'valor' => 2500.00,
                'quantidade' => 20,
                'descricao' => 'Monitor ultrawide para maior produtividade e imersão.'
            ],
            [
                'categoria_id' => 4,
                'sku' => 'MONI003',
                'nome' => 'Monitor 4K 27"',
                'valor' => 3200.00,
                'quantidade' => 15,
                'descricao' => 'Monitor com resolução 4K e suporte a HDR.'
            ],
            [
                'categoria_id' => 5,
                'sku' => 'HEAD001',
                'nome' => 'Headset Gamer Surround',
                'valor' => 380.00,
                'quantidade' => 70,
                'descricao' => 'Headset com som surround 7.1 e microfone removível.'
            ],
            [
                'categoria_id' => 5,
                'sku' => 'HEAD002',
                'nome' => 'Headset Bluetooth',
                'valor' => 450.00,
                'quantidade' => 50,
                'descricao' => 'Headset sem fio com conexão Bluetooth e bateria de longa duração.'
            ],
            [
                'categoria_id' => 5,
                'sku' => 'HEAD003',
                'nome' => 'Fone de Ouvido Over-ear',
                'valor' => 300.00,
                'quantidade' => 80,
                'descricao' => 'Fone de ouvido confortável para uso prolongado.'
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
