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
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->string('raison_sociale');
            $table->string('nom_prenom');
            $table->enum('sexe', ['M', 'F']);
            $table->string('tel')->nullable();
            $table->string('gsm')->nullable();
            $table->string('mail')->nullable();
            $table->string('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->string('paye')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('tp')->nullable();
            $table->string('id_fis')->nullable();
            $table->string('reg_com')->nullable();
            $table->string('ice')->nullable();
            $table->string('n_compte')->nullable();
            $table->string('banque')->nullable();
            $table->decimal('solde', 15, 2)->default(0);
            $table->decimal('plafond', 15, 2)->nullable();
            $table->boolean('bloque')->default(false);
            $table->integer('ordre')->nullable();
            $table->boolean('par_defaut')->default(false);
            $table->text('observation')->nullable();
            $table->string('photo')->nullable();
            $table->float('lat')->nullable();
            $table->float('lon')->nullable();
            $table->decimal('remise', 5, 2)->default(0);
            $table->foreignId('type_fournisseur_id')->constrained('type_fournisseurs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fournisseurs');
    }
};
