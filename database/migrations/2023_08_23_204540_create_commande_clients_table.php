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
        Schema::create('commande_clients', function (Blueprint $table) {
            $table->id();
            $table->date('date_commande');
            $table->string('quantite_produit',5)->nullable();
            $table->float('taxe_charge_payer')->nullable();
            $table->enum('commande_confirmer',["on","off"])->default("off");

            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('identification_personnes')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("commande_clients", function(Blueprint $table){
            $table->dropForeign("client_id");
        });
        Schema::dropIfExists('commande_clients');
    }
};
