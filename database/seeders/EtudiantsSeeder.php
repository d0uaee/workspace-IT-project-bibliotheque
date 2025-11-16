<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EtudiantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etudiants = [
            [
                'nom' => 'Alami',
                'prenom' => 'Ahmed',
                'email' => 'ahmed.alami@univ.edu',
                'numero_etudiant' => 'ET2024001',
                'telephone' => '0661234567',
                'mot_de_passe' => Hash::make('password123'),
                'statut' => 'actif',
                'date_inscription' => now()->subMonths(6),
                'nombre_retards' => 0,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Benali',
                'prenom' => 'Fatima',
                'email' => 'fatima.benali@univ.edu',
                'numero_etudiant' => 'ET2024002',
                'telephone' => '0662345678',
                'mot_de_passe' => Hash::make('password123'),
                'statut' => 'actif',
                'date_inscription' => now()->subMonths(5),
                'nombre_retards' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Chakir',
                'prenom' => 'Omar',
                'email' => 'omar.chakir@univ.edu',
                'numero_etudiant' => 'ET2024003',
                'telephone' => '0663456789',
                'mot_de_passe' => Hash::make('password123'),
                'statut' => 'actif',
                'date_inscription' => now()->subMonths(4),
                'nombre_retards' => 0,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Drissi',
                'prenom' => 'Aicha',
                'email' => 'aicha.drissi@univ.edu',
                'numero_etudiant' => 'ET2024004',
                'telephone' => '0664567890',
                'mot_de_passe' => Hash::make('password123'),
                'statut' => 'restreint',
                'date_inscription' => now()->subMonths(8),
                'nombre_retards' => 3,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'El Fassi',
                'prenom' => 'Youssef',
                'email' => 'youssef.elfassi@univ.edu',
                'numero_etudiant' => 'ET2024005',
                'telephone' => '0665678901',
                'mot_de_passe' => Hash::make('password123'),
                'statut' => 'actif',
                'date_inscription' => now()->subMonths(3),
                'nombre_retards' => 0,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('etudiants')->insert($etudiants);
    }
}
