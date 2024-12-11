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
            ['nome' => 'Hardware'],
            ['nome' => 'Mouses'],
            ['nome' => 'Teclados'],
            ['nome' => 'Monitores'],
            ['nome' => 'Headsets']
        ];

        foreach($data as $record){
            ProdutoCategoria::firstOrCreate(
                ['nome' => $record['nome']],
                $record
            );
        }
    }
}
