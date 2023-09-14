<?php

namespace Database\Seeders;

use App\Models\TypeProduit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('set foreign_key_checks=0');
        DB::statement('truncate type_produits');

        $donnees = [
            ['lib_type_produit'=>'ITECH'],
            ['lib_type_produit'=>'ACCESSOIRS DE MAISON'],
            ['lib_type_produit'=>'ACCESSOIRS DE BUREAU']
        ];

        foreach($donnees as $d){
            TypeProduit::create($d);
        }
    }
}
