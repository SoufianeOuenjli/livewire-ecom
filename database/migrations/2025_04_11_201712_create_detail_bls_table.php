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
        Schema::create('detail_bls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bon_livraison_id')->constrained('bon_livraisons')->onDelete('cascade');
            $table->foreignId('article_id')->constrained('articles')->onDelete('cascade');
            $table->decimal('qte', 10, 2);
            $table->decimal('prix_ht', 10, 2);
            $table->decimal('tva', 5, 2);
            $table->decimal('remise', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_b_l_s');
    }
};
