<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LivresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $livres = [
            // Informatique (id_categorie: 1)
            [
                'isbn' => '9780134685991',
                'titre' => 'Effective Java',
                'auteur' => 'Joshua Bloch',
                'annee_publication' => 2018,
                'description' => 'Guide complet pour écrire du code Java efficace et maintenable',
                'image' => null,
                'nombre_exemplaires' => 3,
                'nombre_disponibles' => 2,
                'id_categorie' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => '9780135957059',
                'titre' => 'The Pragmatic Programmer',
                'auteur' => 'David Thomas, Andrew Hunt',
                'annee_publication' => 2019,
                'description' => 'Guide pratique pour devenir un programmeur plus efficace',
                'image' => null,
                'nombre_exemplaires' => 2,
                'nombre_disponibles' => 1,
                'id_categorie' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => '9780134494166',
                'titre' => 'Clean Code',
                'auteur' => 'Robert C. Martin',
                'annee_publication' => 2008,
                'description' => 'Manuel de l\'artisanat logiciel agile',
                'image' => null,
                'nombre_exemplaires' => 4,
                'nombre_disponibles' => 3,
                'id_categorie' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Mathématiques (id_categorie: 2)
            [
                'isbn' => '9780486612720',
                'titre' => 'Introduction to Mathematical Thinking',
                'auteur' => 'Keith Devlin',
                'annee_publication' => 2012,
                'description' => 'Introduction à la pensée mathématique pour les étudiants',
                'image' => null,
                'nombre_exemplaires' => 2,
                'nombre_disponibles' => 2,
                'id_categorie' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => '9780521558259',
                'titre' => 'Linear Algebra and Its Applications',
                'auteur' => 'Gilbert Strang',
                'annee_publication' => 2016,
                'description' => 'Algèbre linéaire et ses applications pratiques',
                'image' => null,
                'nombre_exemplaires' => 3,
                'nombre_disponibles' => 1,
                'id_categorie' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Physique (id_categorie: 3)
            [
                'isbn' => '9780321973610',
                'titre' => 'University Physics with Modern Physics',
                'auteur' => 'Hugh D. Young, Roger A. Freedman',
                'annee_publication' => 2019,
                'description' => 'Manuel complet de physique universitaire',
                'image' => null,
                'nombre_exemplaires' => 5,
                'nombre_disponibles' => 4,
                'id_categorie' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Littérature (id_categorie: 4)
            [
                'isbn' => '9782070360024',
                'titre' => 'L\'Étranger',
                'auteur' => 'Albert Camus',
                'annee_publication' => 1942,
                'description' => 'Roman existentialiste classique de la littérature française',
                'image' => null,
                'nombre_exemplaires' => 6,
                'nombre_disponibles' => 5,
                'id_categorie' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => '9782070413119',
                'titre' => 'Candide',
                'auteur' => 'Voltaire',
                'annee_publication' => 1759,
                'description' => 'Conte philosophique satirique des Lumières',
                'image' => null,
                'nombre_exemplaires' => 4,
                'nombre_disponibles' => 3,
                'id_categorie' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Histoire (id_categorie: 5)
            [
                'isbn' => '9782070326235',
                'titre' => 'Histoire du Maroc',
                'auteur' => 'Bernard Lugan',
                'annee_publication' => 2011,
                'description' => 'Histoire complète du Maroc des origines à nos jours',
                'image' => null,
                'nombre_exemplaires' => 3,
                'nombre_disponibles' => 2,
                'id_categorie' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Sciences Économiques (id_categorie: 6)
            [
                'isbn' => '9780134106144',
                'titre' => 'Principles of Economics',
                'auteur' => 'N. Gregory Mankiw',
                'annee_publication' => 2017,
                'description' => 'Principes fondamentaux de l\'économie moderne',
                'image' => null,
                'nombre_exemplaires' => 2,
                'nombre_disponibles' => 0,
                'id_categorie' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('livres')->insert($livres);
    }
}
