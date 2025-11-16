<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'nom' => 'Admin',
                'prenom' => 'Super',
                'email' => 'admin@bibliotheque.ma',
                'mot_de_passe' => Hash::make('password123'),
                'role' => 'super_admin',
                'actif' => true,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Bibliothécaire',
                'prenom' => 'Principal',
                'email' => 'bibliothecaire@bibliotheque.ma',
                'mot_de_passe' => Hash::make('password123'),
                'role' => 'admin',
                'actif' => true,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Assistant',
                'prenom' => 'Bibliothèque',
                'email' => 'assistant@bibliotheque.ma',
                'mot_de_passe' => Hash::make('password123'),
                'role' => 'admin',
                'actif' => true,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('admins')->insert($admins);
    }
}
