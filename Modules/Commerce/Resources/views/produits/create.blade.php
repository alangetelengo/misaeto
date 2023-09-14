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
                <h2><strong>Ajouter un produit</strong></h2>
            </div>
            <!-- END Normal Form Title -->

            {{-- <form action="{{ route('produit.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="photo">photo du produit</label>
                            <input type="file" name="image_produit" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit">Valider</button>
                    </div>
                </div>
            </form> --}}

            <!-- Normal Form Content -->
            {{-- <form action="{{ route('produit.store') }}" method="post" enctype="multipart/form-data" class="form-group" id="addProduit"> --}}
            <form action="{{ route('produit.store') }}" method="post" enctype="multipart/form-data" class="form-group" id="formulaire">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="type_produit_id">Type de produit <span class="text-danger">*</span></label>
                            <select name="type_produit_id" id="type_produit_id" class="form-control select-chosen @error('type_produit_id') is-invalid @enderror" data-placeholder="Choisir un type de produit.." style="width: 250px; display: none;">
                                <option></option>
                                @foreach ($typeProduits as $item)
                                <option value="{{ $item->id }}">{{ $item->lib_type_produit }}</option>
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
                            <input type="text" name="lib_produit" class="form-control @error('lib_produit') is-invalid @enderror" placeholder="Entrer le nom du produit" value="{{ old('lib_produit') }}">
                            @error('lib_produit')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="nom_fournisseur">Fournisseur</label>
                            <input type="text" name="nom_fournisseur" class="form-control @error('nom_fournisseur') is-invalid @enderror" placeholder="Entrer le nom du fournisseur" value="{{ old('nom_fournisseur') }}">
                            @error('nom_fournisseur')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="date_commande">Date d'émission de la commande <span class="text-danger">*</span></label>
                            <input type="date" name="date_commande" class="form-control" value="{{ old('date_commande') }}">
                            @error('date_commande')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <div class="form-group">
                            <label class="control-label" for="cota">Cota <span class="text-danger">*</span></label>
                            <input type="text" id="cota" name="cota" class="form-control" value="{{ old('cota') }}" placeholder="1">
                            @error('cota')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="prix_brut">Prix brut</label>
                            <input type="text" id="prix_brut" min="1" name="prix_brut" class="form-control @error('prix_brut') is-invalid @enderror" value="{{ old('prix_brut') }}">
                            @error('prix_brut')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="prix_hors_taxe">Prix hors taxe</label>
                            <input type="text"  name="prix_hors_taxe" onkeydown="calculer()" id="prixhorstaxe" class="somme form-control @error('prix_hors_taxe') is-invalid @enderror" value="{{ old('prix_hors_taxe') }}">
                            @error('prix_hors_taxe')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="poids">Poids(kilo)</label>
                            <input type="text" id="nbrepoids" name="poids" onkeydown="calculer()" class="poids form-control @error('poids') is-invalid @enderror" placeholder="Entrer le nombre de kilo">
                            <span class="error" id="errornbrepoids"></span>
                            @error('poids')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="indice_legislatif">Montant/kilo</label>
                            <input type="text" name="indice_legislatif" onkeydown="calculer()" id="indicelegislatif" class="mtaxecharge form-control @error('indice_legislatif') is-invalid @enderror" placeholder="9000/kilo" value="{{ old('indice_legislatif') }}">
                            <span class="error" id="errorindicelegislatif"></span>
                            @error('indice_legislatif')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="taxe_charge">Taxe/charge</label>
                            <input type="hidden" name="taxe_charge" id="mtaxecharge" class="form-control">
                            <input type="text" id="mtaxechargevu" class="somme form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="prix_ttc">Prix TTC</label>
                            <input type="hidden" name="prix_ttc" id="ttc" class="form-control">
                            <input type="text" class="form-control" id="ttcvu" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="prixvente">Prix de vente</label>
                            <input type="text" name="prix_vente" class="form-control @error('prix_vente') is-invalid @enderror" value="{{ old('prix_vente') }}">
                            @error('prix_vente')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="photo">image du produit</label>
                            <input type="file" name="image_produit" value="{{ old('image_produit') }}" id="image_produit" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4 col-md-offset-0 mb-4">
                        <img src="" id="profile-img-tag" style="outline-style:hidden" height="150" width="150" />
                    </div>
                    <div class="col-md-9">
                        <div class="form-group form-actions">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Valider</button>
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
