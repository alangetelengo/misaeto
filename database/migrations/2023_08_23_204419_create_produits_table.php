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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('lib_produit',100)->nullable();
            $table->string('fournisseur',100)->nullable();
            $table->mediumText('photo')->nullable();
            $table->integer('cota')->default(1);
            $table->float('prix_brut')->nullable();
            $table->float('prix_hors_taxe')->nullable();
            $table->float('poids')->nullable();
            $table->float('indice_legislatif')->nullable();
            $table->float('taxe_charge')->nullable()->comment('poids x indice législative');
            $table->float('prix_ttc')->nullable()->comment('prix hors taxe + taxe_charge');
            $table->boolean("estDisponible")->default(1);

            $table->unsignedInteger('type_produit_id');
            $table->foreign('type_produit_id')->references('id')->on('type_produits')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("produits", function(Blueprint $table){
            $table->dropForeign("type_produit_id");
        });
        Schema::dropIfExists('produits');
    }
};
