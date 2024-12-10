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
                'email' => 'cliente@cliente.com',
                'password' => Hash::make('cliente'),
                'user_level' => 1
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
