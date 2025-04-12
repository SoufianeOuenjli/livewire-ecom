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
        Schema::create('sous_familles', function (Blueprint $table) {
            $table->id();
            $table->string('sous_famille');
            $table->string('photo')->nullable();
            $table->decimal('tva', 8, 2);
            $table->decimal('marge', 8, 2);
            $table->foreignId('famille_id')->constrained('familles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sous_familles');
    }
};
