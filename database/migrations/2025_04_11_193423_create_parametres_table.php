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
        Schema::create('parametres', function (Blueprint $table) {
            $table->id();
            $table->string('raison_social');
            $table->string('nom_prenom');
            $table->text('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('pays')->nullable();
            $table->string('tp')->nullable();
            $table->string('id_fis')->nullable();
            $table->string('reg_com')->nullable();
            $table->string('cnss')->nullable();
            $table->string('ice')->nullable();
            $table->string('banque')->nullable();
            $table->string('compte')->nullable();
            $table->string('tel')->nullable();
            $table->string('fax')->nullable();
            $table->string('gsm')->nullable();
            $table->string('email')->nullable();
            $table->text('en_tete_ticket')->nullable();
            $table->text('pied_page_ticket')->nullable();
            $table->string('image')->nullable();
            $table->string('image_logo')->nullable();
            $table->string('logo_ticket')->nullable();
            $table->string('token')->nullable();
            $table->date('date_expiration')->nullable();
            $table->string('periode')->nullable();
            $table->boolean('bloque')->default(false);
            $table->integer('nbr_decimale')->default(2);
            $table->string('en_tete_color_fond')->nullable();
            $table->string('en_tete_color')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametres');
    }
};
