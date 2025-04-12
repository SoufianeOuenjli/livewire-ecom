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
        Schema::create('reglement_clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('mode_reglement_id')->constrained('mode_reglements')->onDelete('cascade');
            $table->foreignId('etat_reglement_id')->constrained('etat_reglements')->onDelete('cascade');
            $table->date('date_reglement');
            $table->decimal('montant', 10, 2);
            $table->string('libelle')->nullable();
            $table->decimal('encaisser',8,2);
            $table->text('observation')->nullable();
            $table->date('date_echeance')->nullable();
            $table->boolean('bloque')->default(false);
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('updated_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('valide_par')->constrained('users')->onDelete('cascade');
            $table->foreignId('compte_id')->constrained('comptes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reglement_clients');
    }
};
