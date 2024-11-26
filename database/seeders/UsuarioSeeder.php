<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('codifica'),
            'user_level' => 1
        ]);
    }
}
