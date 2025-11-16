<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Informatique',
                'description' => 'Livres sur la programmation, les systèmes, les réseaux et les technologies informatiques',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mathématiques',
                'description' => 'Ouvrages de mathématiques pures et appliquées',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Physique',
                'description' => 'Livres de physique théorique et expérimentale',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Littérature',
                'description' => 'Romans, poésie, théâtre et essais littéraires',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Histoire',
                'description' => 'Ouvrages historiques et biographies',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sciences Économiques',
                'description' => 'Économie, gestion, finance et commerce',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Langues',
                'description' => 'Apprentissage des langues étrangères et linguistique',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sciences Sociales',
                'description' => 'Sociologie, psychologie, anthropologie',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
