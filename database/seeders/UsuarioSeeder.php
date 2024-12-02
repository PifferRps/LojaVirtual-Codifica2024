<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
                'user_level' => 999
            ],
            [
                'email' => 'usercpf@usercpf.com',
                'password' => Hash::make('usercpf'),
                'user_level' => 1
            ],
            [
                'email' => 'usercnpj@usercnpj.com',
                'password' => Hash::make('usercnpj'),
                'user_level' => 2
            ]
        ];

        foreach($data as $record){
            Usuario::firstOrCreate(
                ['email' => $record['email']],
                $record
            );
        }

    }
}
