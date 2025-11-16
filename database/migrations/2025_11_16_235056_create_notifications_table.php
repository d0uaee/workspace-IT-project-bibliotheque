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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_etudiant')->nullable()->constrained('etudiants')->onDelete('cascade');
            $table->foreignId('id_admin')->nullable()->constrained('admins')->onDelete('set null');
            $table->enum('type', [
                'rappel_retour',
                'livre_disponible', 
                'reservation_expiree',
                'sanction',
                'demande_approuvee',
                'demande_rejetee',
                'general'
            ]);
            $table->string('titre');
            $table->text('message');
            $table->timestamp('date_envoi')->useCurrent();
            $table->boolean('lu')->default(false);
            $table->boolean('email_envoye')->default(false);
            $table->timestamp('date_lecture')->nullable();
            $table->json('metadata')->nullable(); // For additional data like book_id, loan_id, etc.
            $table->timestamps();
            
            // Indexes for performance
            $table->index(['id_etudiant', 'lu']);
            $table->index(['type', 'date_envoi']);
            $table->index('date_envoi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
