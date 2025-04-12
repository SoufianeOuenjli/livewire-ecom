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
        Schema::create('devis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->string('n_document')->unique();
            $table->date('date');
            $table->time('heure');
            $table->decimal('remise', 15, 2)->nullable();
            $table->decimal('escompte', 15, 2)->nullable();
            $table->text('observation')->nullable();
            $table->boolean('valide')->default(false);
            $table->foreignId('saisie_par')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devis');
    }
};
