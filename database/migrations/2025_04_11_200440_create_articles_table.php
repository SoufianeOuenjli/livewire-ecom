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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('code_barre')->nullable();
            $table->string('reference')->nullable();
            $table->string('designation')->nullable();
            $table->string('description');
            $table->decimal('prix_achat_ht',8,2);
            $table->decimal('tva',8,2);
            $table->decimal('marge',8,2);
            $table->decimal('prix_vente_ht',8,2);
            $table->decimal('stock_min',8,2);
            $table->decimal('stock_max',8,2);
            $table->boolean('bloque')->default(false);
            $table->boolean('gerer_stock')->default(false);
            $table->string('vignette');
            $table->date('date_dernier_vente')->nullable();
            $table->date('date_dernier_achat')->nullable();
            $table->decimal('prix_dernier_vente',8,2);
            $table->decimal('prix_dernier_achat',8,2);
            $table->decimal('stock',8,2);
            $table->foreignId('photo_id')->constrained('photos')->onDelete('cascade');
            $table->foreignId('marque_id')->constrained('marques')->onDelete('cascade');
            $table->foreignId('sous_famille_id')->constrained('sous_familles')->onDelete('cascade');
            $table->foreignId('unite_id')->constrained('unites')->onDelete('cascade');
            $table->foreignId('conditionement_id')->constrained('conditionements')->onDelete('cascade');
            $table->foreignId('fournisseur_id')->constrained('fournisseurs')->onDelete('cascade');
            $table->foreignId('article_parent_id')->nullable()->constrained('articles')->onDelete('set null');
            $table->foreignId('article_fils_id')->nullable()->constrained('articles')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
