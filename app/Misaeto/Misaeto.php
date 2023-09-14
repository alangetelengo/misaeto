<?php
namespace App\Misaeto;

use App\Models\Personne;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Misaeto{

    public function nom($nom){
        Log::channel('misaeto')->info($nom);

        return $nom;
    }

    public static function uniqueString(Request $request,$sufix){

        $str = "";
        $str .= $request->input("nom".$sufix);
        $str .= $request->input("prenom".$sufix);
        $str .= $request->input("telephone".$sufix);
        $str .= $request->input("sexe".$sufix);
        return strtoupper($str);

    }

    public static function savePersonne(Request $request,$sufix,$uniqueString) :Personne
    {
        try {

            $personne = new Personne;
            $personne->nom = $request->input("nom".$sufix);
            $personne->prenom = $request->input("prenom".$sufix);
            $personne->sexe = $request->input("sexe".$sufix);
            $personne->telephone = $request->input("telephone".$sufix);
            $personne->adresse = $request->input("adresse".$sufix);
            $personne->uniqueString = $uniqueString;
            $personne->save();

            return $personne;
        } catch (Exception $e) {
            Log::channel('misaeto')->error($e->getMessage());
            return redirect()->back();
        }
    }
}
