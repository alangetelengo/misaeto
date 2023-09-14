<?php

namespace Modules\Commerce\Http\Controllers;

use Exception;
use App\Models\Produit;
use App\Models\TypeProduit;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;
use Modules\Commerce\Http\Requests\ProduitRequest;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $produits = Produit::all();
        return view('commerce::produits.index',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $typeProduits = TypeProduit::all();
        return view('commerce::produits.create',compact('typeProduits'));
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    // public function store(ProduitRequest $request)
    public function store(ProduitRequest $request)
    {
        // dd($request->all());
        // $prixTTC = $prix_hors_taxe + $taxe_et_charge;
        // $taxe_et_charge = $nbreKilo * $indice_legislatif;//ok
        DB::beginTransaction();
        try {

            $image = $request->file('image_produit')->getClientOriginalName();
            $request->file('image_produit')->storeAs("public/images", $image);

            // $path = str_replace('public', '/storage', $image);
            $produit = new Produit;
            $produit->type_produit_id = $request->type_produit_id;
            $produit->lib_produit = $request->lib_produit;
            $produit->fournisseur = $request->nom_fournisseur;
            $produit->poids = $request->poids;
            $produit->cota = $request->cota;
            $produit->prix_brut = $request->prix_brut;
            $produit->prix_hors_taxe = $request->prix_hors_taxe;
            $produit->indice_legislatif = $request->indice_legislatif;
            $produit->taxe_charge = $request->taxe_charge;
            $produit->prix_ttc = $request->prix_ttc;
            $produit->prix_vente = $request->prix_vente;
            $produit->date_commande = $request->date_commande;
            $produit->photo = $image;
            // $produit->estDisponible = $request->estDisponible;
            $produit->save();

            DB::commit();

            toastr()->success("Article ajouté avec succès");
            return redirect()->back();
            // return  response()->json([
            //     "code"=>"200",
            //     "message"=>"Article ajouté avec succès"
            // ]);

        } catch (Exception $e) {
            DB::rollback();
            toastr()->error($e->getMessage());
            return redirect()->back()->withInput();
            // return  response()->json([
            //         "code"=>"180",
            //         // "message"=>["error" =>$e->getMessage()]
            //         "message"=>["error" =>"Ce produit existe déjà"]
            //     ]);
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('commerce::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $produit = Produit::find($id);
        if($produit == null){
            toastr()->error("Impossible de charger cette page");
            return back();
        }
        $typeProduits = TypeProduit::all();
        return view('commerce::produits.edit' ,compact('typeProduits','produit'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        
        $produit = Produit::find($id);
        if($produit == null){
            toastr()->error("Impossible de charger cette page");
            return back();
        }

        DB::beginTransaction();
        try {

            if($request->file('image_produit') != null){
                $image = $request->file('image_produit')->getClientOriginalName();
                $request->file('image_produit')->storeAs("public/images", $image);
                $produit->photo = $image;
            }
            $produit->type_produit_id = $request->type_produit_id;
            $produit->lib_produit = $request->lib_produit;
            $produit->fournisseur = $request->nom_fournisseur;
            $produit->poids = $request->poids;
            $produit->cota = $request->cota;
            $produit->prix_brut = $request->prix_brut;
            $produit->prix_hors_taxe = $request->prix_hors_taxe;
            $produit->indice_legislatif = $request->indice_legislatif;
            $produit->taxe_charge = $request->taxe_charge;
            $produit->prix_ttc = $request->prix_ttc;
            $produit->prix_vente = $request->prix_vente;
            $produit->date_commande = $request->date_commande;

            $produit->save();

            DB::commit();

            toastr()->success("Article modifié avec succès");
            return redirect()->back();

        } catch (Exception $e) {
            DB::rollback();
            toastr()->error($e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

}
