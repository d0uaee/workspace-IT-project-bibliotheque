<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emprunts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_demande')->constrained('demande_emprunts')->onDelete('cascade');
            $table->foreignId('id_etudiant')->constrained('etudiants')->onDelete('cascade');
            $table->foreignId('id_livre')->constrained('livres')->onDelete('cascade');
            $table->timestamp('date_emprunt')->useCurrent();
            $table->date('date_retour_prevue');
            $table->timestamp('date_retour_effective')->nullable();
            $table->enum('statut', ['en_cours', 'retourne', 'en_retard', 'perdu'])->default('en_cours');
            $table->boolean('prolonge')->default(false);
            $table->timestamp('date_prolongation')->nullable();
            $table->text('commentaire_retour')->nullable();
            $table->foreignId('valide_par')->constrained('admins')->onDelete('cascade');
            $table->timestamps();
            
            // Indexes for performance and business logic
            $table->index(['id_etudiant', 'statut']);
            $table->index(['id_livre', 'statut']);
            $table->index(['date_retour_prevue', 'statut']);
            $table->index('date_emprunt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprunts');
    }
};
