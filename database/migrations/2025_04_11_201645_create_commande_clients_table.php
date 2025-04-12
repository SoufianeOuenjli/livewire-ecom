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
        Schema::create('commande_clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('devi_id')->constrained('devis')->onDelete('cascade');
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
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
        Schema::dropIfExists('commande_clients');
    }
};
