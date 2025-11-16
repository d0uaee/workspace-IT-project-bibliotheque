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
        Schema::create('demande_emprunts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_etudiant')->constrained('etudiants')->onDelete('cascade');
            $table->foreignId('id_livre')->constrained('livres')->onDelete('cascade');
            $table->timestamp('date_demande')->useCurrent();
            $table->enum('statut', ['en_attente', 'approuvee', 'rejetee', 'annulee'])->default('en_attente');
            $table->text('commentaire_admin')->nullable();
            $table->foreignId('traite_par')->nullable()->constrained('admins')->onDelete('set null');
            $table->timestamp('date_traitement')->nullable();
            $table->timestamps();
            
            // Indexes for performance
            $table->index(['id_etudiant', 'statut']);
            $table->index(['id_livre', 'statut']);
            $table->index('date_demande');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_emprunts');
    }
};
