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
        Schema::create('operation_bancaires', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId(column: 'compte_id')->constrained('comptes')->onDelete('cascade');
            $table->foreignId(column: 'type_operation_bancaire_id')->constrained('type_operation_bancaires')->onDelete('cascade');
            $table->string('operation_bancaire');
            $table->decimal('montant', 8, 2);
            $table->decimal('debit_credit', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operation_bancaires');
    }
};
