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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_etudiant')->constrained('etudiants')->onDelete('cascade');
            $table->foreignId('id_livre')->constrained('livres')->onDelete('cascade');
            $table->integer('note')->unsigned()->check('note >= 1 AND note <= 5');
            $table->text('commentaire')->nullable();
            $table->boolean('approuve')->default(true);
            $table->timestamp('date_evaluation')->useCurrent();
            $table->timestamps();
            
            // Unique constraint: one evaluation per student per book
            $table->unique(['id_etudiant', 'id_livre'], 'unique_student_book_evaluation');
            
            // Indexes for performance
            $table->index(['id_livre', 'approuve']);
            $table->index('note');
            $table->index('date_evaluation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
