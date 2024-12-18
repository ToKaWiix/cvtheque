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
    if (!Schema::hasTable('metiers')) {
        Schema::create('metiers', function (Blueprint $table) {
            $table->id()->comment('Identifiant de la table compétences');
            $table->string('intitule', 120)->comment('Nom du metier');
            $table->text('description')->comment('Description du metier');
            $table->string('slug', 220)->unique()->comment('Slug');
            $table->timestamps();
        });
    }
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competences');
    }
};
