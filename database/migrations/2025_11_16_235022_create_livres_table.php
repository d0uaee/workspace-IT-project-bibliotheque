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
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('isbn')->unique();
            $table->string('titre');
            $table->string('auteur');
            $table->year('annee_publication');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('nombre_exemplaires')->default(1);
            $table->integer('nombre_disponibles')->default(1);
            $table->foreignId('id_categorie')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
            
            // Indexes for search optimization
            $table->index(['titre', 'auteur']);
            $table->index('isbn');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};
