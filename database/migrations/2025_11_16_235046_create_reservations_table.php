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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_etudiant')->constrained('etudiants')->onDelete('cascade');
            $table->foreignId('id_livre')->constrained('livres')->onDelete('cascade');
            $table->timestamp('date_reservation')->useCurrent();
            $table->enum('statut', ['active', 'notifiee', 'expiree', 'annulee', 'convertie'])->default('active');
            $table->timestamp('date_notification')->nullable();
            $table->timestamp('date_expiration')->nullable();
            $table->integer('position_queue')->default(1);
            $table->timestamps();
            
            // Indexes for FIFO queue management
            $table->index(['id_livre', 'statut', 'position_queue']);
            $table->index(['id_etudiant', 'statut']);
            $table->index('date_reservation');
            
            // Unique constraint to prevent duplicate active reservations
            $table->unique(['id_etudiant', 'id_livre', 'statut'], 'unique_active_reservation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
