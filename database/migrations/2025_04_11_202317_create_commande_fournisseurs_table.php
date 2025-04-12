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
        Schema::create('commande_fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fournisseur_id')->constrained('fournisseurs')->onDelete('cascade');
            $table->string('n_document');
            $table->date('date');
            $table->time('heure');
            $table->decimal('tva', 8, 2)->nullable();
            $table->decimal('remisse', 8, 2)->nullable();
            $table->decimal('escompte', 8, 2)->nullable();
            $table->string('observation');
            $table->boolean('valide')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_fournisseurs');
    }
};
