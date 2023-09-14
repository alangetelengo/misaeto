@extends('layout.app')
@section('style')
<script src="{{ asset('template/js/jquery-3.5.1.min.js') }}"></script>

@endsection
@section('contenu')

<div class="block">
    <div class="row">
            <div class="block full">
                <!-- Navigation Tabs Title -->
                <div class="block-title">
                    <ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="active"><a href="#add-commande">Ajouter une commande</a></li>
                        <li class="listecmde"><a href="#liste-commande">Liste des commandes</a></li>
                    </ul>
                </div>
                <!-- Navigation Tabs Content -->
                <div class="tab-content">
                    <div class="tab-pane active" id="add-commande">
                        <form action="{{ route('commandeClient.store') }}" method="post" class="form-group">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="nom_client">Nom du client <span class="text-danger">*</span></label>
                                        <input type="text" name="nom_client" required class="form-control @error('nom_client') is-invalid @enderror" placeholder="Entrer le nom du client" value="{{ old('nom_client') }}">
                                        @error('nom_client')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="sexe_client">Sexe du produit <span class="text-danger">*</span></label>
                                        <select name="sexe_client" required class="form-control select-chosen @error('sexe_client') is-invalid @enderror" data-placeholder="Choisir un produit.." style="width: 250px; display: none;">
                                            <option></option>
                                            <option value="M">Homme</option>
                                            <option value="F">Femme</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="telephone_client">Téléphone du client <span class="text-danger">*</span></label>
                                        <input type="text" name="telephone_client" required class="form-control @error('telephone_client') is-invalid @enderror" placeholder="Entrer le nom du client" value="{{ old('telephone_client') }}">
                                        @error('telephone_client')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="adresse_client">Adresse du client <span class="text-danger"></span></label>
                                        <input type="text" name="adresse_client" class="form-control @error('adresse_client') is-invalid @enderror" placeholder="Entrer le nom du client" value="{{ old('adresse_client') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="lib_produit">Nom du produit <span class="text-danger">*</span></label>
                                        <select name="produit_id" id="idproduit" required class="form-control select-chosen @error('produit_id') is-invalid @enderror" data-placeholder="Choisir un produit.." style="width: 250px; display: none;">
                                            <option></option>
                                            @foreach ($produits as $item)
                                            <option value="{{ $item->id.'/'.$item->prix_hors_taxe."/".$item->taxe_charge }}">{{ $item->lib_produit }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label class="control-label" for="nombre_produit">Quantité<span class="text-danger">*</span></label>
                                        <input type="text" id="nombre_produit" onkeydown="getQuantiteCommande()" required name="nombre_produit" class="form-control" value="{{ old('nombre_produit') }}" placeholder="1">
                                        @error('nombre_produit')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="prix_hors_taxe">Montant à payer HT</label>
                                        <input type="text" id="montantapayerhorstaxe" name="montantapayerhorstaxe" class="form-control" readonly>
                                    </div>

                                    <input type="hidden" id="prixhorstaxeduproduit" class="form-control">

                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="taxe_charge">Taxe et charge à payer</label>
                                        <input type="text" class="form-control" id="taxechargepayer" name="taxechargepayer" readonly>
                                    </div>

                                    <input type="hidden" id="taxeetcharge" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="date_commande">Date d'émission de la commande <span class="text-danger">*</span></label>
                                        <input type="date" name="date_commande" class="form-control" required value="{{ old('date_commande') }}">
                                        @error('date_commande')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <span class="help-block">Confirmé la commande </span>
                                        <label class="switch switch-success"><input type="checkbox" required name="commande_confirmer"><span></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group form-actions">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Valider</button>
                                        <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="liste-commande">
                        <table id="ecom-products" class="table table-bordered table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Client</th>
                                    <th>Téléphone</th>
                                    <th>Produit</th>
                                    <th>Nombre de pièce</th>
                                    <th>Commandé</th>
                                    <th>Montant à payer HT</th>
                                    {{-- <th>Confirmation</th> --}}
                                    <th>Montant des Taxes et Charges à payer</th>
                                    {{-- <th>Confirmation</th> --}}
                                    <th>Date d'émission</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($CommandeClients as $item)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="hidden-xs">
                                        <a href="{{ route('commandeClient.show', $item->client->id) }}"  data-toggle="tooltip" title="Voir les commandes" class="show-commande btn btn-sm btn-success">{{ $item->client->nomComplet() }}</a>
                                    </td>
                                    <td>{{ $item->client->telephone }}</td>
                                    <td>{{ $item->produit->lib_produit }}</td>
                                    <td>{{ $item->quantite_produit  }}</td>
                                    <td>{{ $item->commande_confirmer == "on" ? "OUI" : "NON"  }}</td>
                                    <td>{{ $item->montant_hors_taxe_payer }}</td>
                                    <td>{{ $item->taxe_charge_payer }}</td>
                                    <td>{{ date("d-m-Y", strtotime($item->date_commande)) }}</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-xs">
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        </div>
                                        <div class="btn-group btn-group-xs">
                                            <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Navigation Tabs Content -->
            </div>
            <!-- END Navigation Tabs -->
        {{-- </div> --}}

    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('template/js/pages/ecomProducts.js') }}"></script>
    <script>$(function(){ EcomProducts.init(); });</script>
<script type="text/javascript">
$(function(){
    $("#idproduit").change(function (e) {
        e.preventDefault();

        $("#nombre_produit").val("");
        var idproduit = $(this).val();
        var produit = idproduit.split('/');
        var leprixht = produit[1];
        var taxeEtCharge = produit[2];

        // alert(leprixht);
        $("#taxeetcharge").val(taxeEtCharge);
        $("#prixhorstaxeduproduit").val(leprixht);
    });

    // $("a.show-commande").on("click", function(e){
    //     e.preventDefault(e);
    //     var code = $(this).attr('href');
    //     var url = "";
    //     url = url.replace(':id', code);

    //     $.get(url, function(){
    //         window.location.replace(url);
    //     });
    //     // alert(code)
    // });


});

function getQuantiteCommande(){
    var qte = parseFloat(document.getElementById("nombre_produit").value);
    var prixhtp = parseFloat(document.getElementById("prixhorstaxeduproduit").value);
    var taxeetchargeproduit = parseFloat(document.getElementById("taxeetcharge").value);

    if(qte != "" && isNaN(qte) == false){
        var montantHTPayer = qte * prixhtp;
        var montanttaxecharge = qte * taxeetchargeproduit;
        //qte * prixht;
        // alert(montantHTPayer);
        document.getElementById("montantapayerhorstaxe").value = montantHTPayer;
        document.getElementById("taxechargepayer").value = montanttaxecharge;

    }

}
</script>
@endsection
