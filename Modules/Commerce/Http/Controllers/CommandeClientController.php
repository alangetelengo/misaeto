<?php

namespace Modules\Commerce\Http\Controllers;

use App\Misaeto\Misaeto;
use App\Models\Client;
use App\Models\CommandeClient;
use App\Models\Personne;
use App\Models\Produit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Support\Facades\Log;
use Modules\Commerce\Http\Requests\CommandeClientRequest;

class CommandeClientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('commerce::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $produits = Produit::all();
        $CommandeClients = CommandeClient::all();
        return view('commerce::commande-client.create',compact('produits','CommandeClients'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CommandeClientRequest $request)
    {
        // dd($request->all());

        $produit = explode("/",$request->produit_id);
        $idprodeuit = $produit[0];
        //
        DB::beginTransaction();
        try {

            $unique = Misaeto::uniqueString($request,"_client");
            $client = Personne::where("uniqueString",$unique)->first();

            if($client == null){
                $client = Misaeto::savePersonne($request,"_client",$unique);
            }

            $cc = new CommandeClient;
            $cc->date_commande = $request->date_commande;
            $cc->quantite_produit = $request->nombre_produit;
            $cc->taxe_charge_payer = $request->taxechargepayer;
            $cc->montant_hors_taxe_payer = $request->montantapayerhorstaxe;
            $cc->commande_confirmer = $request->commande_confirmer;
            $cc->produit_id = $idprodeuit;
            $cc->client_id = $client->id;
            $cc->save();

            DB::commit();

            toastr()->success("Commande du client enregistrée avec succès", "Gestion des commandes");
            return redirect()->back();

        } catch (Exception $e) {
            DB::rollBack();
            Log::channel('misaeto')->error($e->getMessage());
            toastr()->error($e->getMessage());
            return back()->withInput();
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $client = Personne::find($id);
        if($client == null){
            toastr()->error("Impossible de charger cette page");
            return back();
        }

        // $commandes = $client->commandeClients;

        return view("commerce::commande-client.client_commande", compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('commerce::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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
