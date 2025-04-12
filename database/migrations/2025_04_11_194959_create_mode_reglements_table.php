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
        Schema::create('mode_reglements', function (Blueprint $table) {
            $table->id();
            $table->string('mode_reglement');
            $table->string('couleur')->nullable();
            $table->decimal('encaisser',8,2);
            $table->decimal('avoir',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mode_reglements');
    }
};
