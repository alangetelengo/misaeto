@extends('layout.app')
@section('style')
<script src="{{ asset('template/js/jquery-3.5.1.min.js') }}"></script>

@endsection
@section('contenu')

<div class="block">


        <!-- Normal Form Block -->
        <div class="block">
            <!-- Normal Form Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    {{-- <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a> --}}
                </div>
                <h2>Modifier le produit (<strong> {{ $produit->lib_produit }}</strong>)</h2>
            </div>
            <!-- END Normal Form Title -->
            <form action="{{ route('produit.update',$produit->id) }}" method="post" enctype="multipart/form-data" class="form-group" id="formulaire">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="type_produit_id">Type de produit <span class="text-danger">*</span></label>
                            <select name="type_produit_id" id="type_produit_id" class="form-control select-chosen @error('type_produit_id') is-invalid @enderror" data-placeholder="Choisir un type de produit.." style="width: 250px; display: none;">
                                <option></option>
                                @foreach ($typeProduits as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $produit->type_produit_id ? "selected" : "" }} >{{ $item->lib_type_produit }}</option>
                                @endforeach
                            </select>
                            @error('type_produit_id')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="lib_produit">Nom du produit <span class="text-danger">*</span></label>
                            <input type="text" name="lib_produit" class="form-control" placeholder="Entrer le nom du produit" value="{{ $produit->lib_produit }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="nom_fournisseur">Fournisseur</label>
                            <input type="text" name="nom_fournisseur" class="form-control" placeholder="Entrer le nom du fournisseur" value="{{ $produit->fournisseur }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="date_commande">Date d'émission de la commande <span class="text-danger">*</span></label>
                            <input type="date" name="date_commande" class="form-control" value="{{ $produit->date_commande }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <div class="form-group">
                            <label class="control-label" for="cota">Cota <span class="text-danger">*</span></label>
                            <input type="text" id="cota" name="cota" class="form-control" value="{{ $produit->cota }}" placeholder="1">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="prix_brut">Prix brut</label>
                            <input type="text" id="prix_brut" min="1" name="prix_brut" class="form-control" value="{{ $produit->prix_brut }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="prix_hors_taxe">Prix hors taxe</label>
                            <input type="text"  name="prix_hors_taxe" onkeydown="calculer()" id="prixhorstaxe" class="somme form-control" value="{{ $produit->prix_hors_taxe }}">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="poids">Poids(kilo)</label>
                            <input type="text" id="nbrepoids" name="poids" onkeydown="calculer()" class="poids form-control" value="{{ $produit->poids }}" placeholder="Entrer le nombre de kilo">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="indice_legislatif">Montant/kilo</label>
                            <input type="text" name="indice_legislatif" onkeydown="calculer()" id="indicelegislatif" class="mtaxecharge form-control" placeholder="9000/kilo" value="{{ $produit->indice_legislatif }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="taxe_charge">Taxe/charge</label>
                            <input type="hidden" name="taxe_charge" id="mtaxecharge" class="form-control">
                            <input type="text" id="mtaxechargevu" value="{{ $produit->taxe_charge }}" required class="somme form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="prix_ttc">Prix TTC</label>
                            <input type="hidden" name="prix_ttc" id="ttc" class="form-control">
                            <input type="text" class="form-control" value="{{ $produit->prix_ttc }}" required id="ttcvu" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="prixvente">Prix de vente</label>
                            <input type="text" name="prix_vente" class="form-control" value="{{ $produit->prix_vente }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="photo">image du produit</label>
                            <input type="file" name="image_produit" value="{{ $produit->photo }}" id="image_produit" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4 col-md-offset-0 mb-4">
                        {{-- <img src="" id="profile-img-tag" style="outline-style:hidden" height="150" width="150" /> --}}
                        <img width="150" height="150" id="profile-img-tag" src="{{ asset('storage/images/'.$produit->photo) }}" alt="{{ $item->photo }}" class="img-circle">

                    </div>
                    <div class="col-md-9">
                        <div class="form-group form-actions">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Modifier</button>
                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Annuler</button>
                        </div>
                    </div>
                </div>

            </form>

            {{-- <form>
                <p id="myForm"><label>First Name: <input type="text" id="nbre1" class="nbre1 somme"></label></p>
                <p><label>Last Name: <input type="text" class="nbre2 somme" id="nbre2"></label></p>
                <p><label>Email Address: <input type="text" id="lasomme"></label></p>
            </form> --}}

            <!-- END Normal Form Content -->
        </div>
        <!-- END Normal Form Block -->

</div>
@endsection
@section('scripts')
{{-- <script src="{{ asset('template/js/pages/formsValidation.js') }}"></script>
<script>$(function(){ FormsValidation.init(); });</script> --}}

<!-- inline scripts related to this page -->
<script type="text/javascript">

function calculer(){
    var a = parseFloat(document.getElementById('indicelegislatif').value);
    var b = parseFloat(document.getElementById('nbrepoids').value);
    var c = parseFloat(document.getElementById('prixhorstaxe').value);

    if(a != "" && b != "" && c !=""){
        if(isNaN(a) == false && isNaN(b) == false &&  isNaN(c) == false){
            var mtaxecharge = a*b;
            var mttc = c+mtaxecharge;
            document.getElementById('ttc').value = mttc;
            document.getElementById('ttcvu').value = mttc;

            document.getElementById('mtaxecharge').value = mtaxecharge;
            document.getElementById('mtaxechargevu').value = mtaxecharge;
        }
    }
}

</script>
@endsection
