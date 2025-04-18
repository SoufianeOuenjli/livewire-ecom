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
        Schema::create('depenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_depense_id')->constrained('type_depenses')->onDelete('cascade');
            $table->date('date');
            $table->string('libelle');
            $table->decimal('montant', 8, 2);
            $table->boolean('verrouille')->default(false);
            $table->decimal('debit_credit', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depenses');
    }
};
