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
        Schema::create('avoir_clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('depot_id')->constrained('depots')->onDelete('cascade');
            $table->string('n_document');
            $table->date('date');
            $table->time('heure');
            $table->decimal('tva', 8, 2)->nullable();
            $table->decimal('remisse', 8, 2)->nullable();
            $table->decimal('escompte', 8, 2)->nullable();
            $table->string('observation');
            $table->boolean('valide')->default(false);
            $table->boolean('regle')->default(false);
            $table->boolean('verouille')->default(false);
            $table->foreignId('saisie_par')->constrained('users')->onDelete('cascade');
            $table->foreignId('valide_par')->constrained('users')->onDelete('cascade');
            $table->boolean('sur_facture')->default(false);
            $table->foreignId('facture_id')->constrained('factures')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avoir_clients');
    }
};
