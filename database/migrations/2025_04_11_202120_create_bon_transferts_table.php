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
        Schema::create('bon_transferts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('heure');
            $table->foreignId('depot_source_id')->constrained('depots')->onDelete('cascade');
            $table->foreignId('depot_destination_id')->constrained('depots')->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('updated_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bon_transferts');
    }
};
