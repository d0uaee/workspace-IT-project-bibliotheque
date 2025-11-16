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
        Schema::create('retards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_emprunt')->constrained('emprunts')->onDelete('cascade');
            $table->integer('nb_jours');
            $table->decimal('montant_amende', 8, 2)->default(0.00);
            $table->boolean('amende_payee')->default(false);
            $table->timestamp('date_detection')->useCurrent();
            $table->timestamp('date_paiement')->nullable();
            $table->enum('statut', ['actif', 'resolu', 'annule'])->default('actif');
            $table->text('commentaire')->nullable();
            $table->timestamps();
            
            // Indexes for performance
            $table->index(['id_emprunt', 'statut']);
            $table->index('date_detection');
            $table->index('amende_payee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retards');
    }
};
