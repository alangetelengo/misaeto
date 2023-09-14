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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->float('quantite');
            $table->float('reste')->nullable();
            $table->date('date_achat')->nullable();
            $table->date('date_arrivee')->nullable();

            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("stocks", function(Blueprint $table){
            $table->dropForeign("fournisseur_id");
            $table->dropForeign("produit_id");
        });
        Schema::dropIfExists('stocks');
    }
};
