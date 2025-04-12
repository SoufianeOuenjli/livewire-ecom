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
        Schema::create('depots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_depot_id')->constrained('type_depots')->onDelete('cascade');
            $table->string('depot');
            $table->string('adresse');
            $table->string('ville');
            $table->string('pays');
            $table->string('tel');
            $table->string('gsm');
            $table->string('responsable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depots');
    }
};
