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
        Schema::create('identification_personnes', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 150);
            $table->string('prenom', 100)->nullable();
            $table->enum('sexe', ['M','F'])->nullable();
            $table->string('adresse', 150)->nullable();
            $table->string('telephone', 15)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identification_personnes');
    }
};
