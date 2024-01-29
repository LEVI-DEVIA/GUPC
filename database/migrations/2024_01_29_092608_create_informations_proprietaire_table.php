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
        Schema::create('informations_proprietaire', function (Blueprint $table) {
            $table->id();
            $table->string('proprietaire');
            $table->string('nomGerant');
            $table->string('adressePostale');
            $table->string('adresseElectronique');
            $table->integer('tel');
            $table->unsignedBigInteger('demande_id');
            $table->foreign('demande_id')->references('id')->on('demande_permis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informations_proprietaire');
    }
};
