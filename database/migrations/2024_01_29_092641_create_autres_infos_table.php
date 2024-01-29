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
        Schema::create('autres_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('numeroTf');
            $table->string('sectionCadastral');
            $table->string('Lotissement');
            $table->string('lot');
            $table->integer('superficie');
            $table->string('autreTitre');
            $table->string('numActe');
            $table->date('dateActe');
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
        Schema::dropIfExists('autres_infos');
    }
};
