@extends('layout.app')
@section('style')

@endsection
@section('contenu')

<div class="block">
    <!-- Example Title -->
    <div class="block-title">
        <div class="block-options pull-right">
            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
            <div class="btn-group btn-group-sm">
                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default dropdown-toggle enable-tooltip" data-toggle="dropdown" title="Options"><span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                    <li>
                        <a href="javascript:void(0)"><i class="gi gi-cloud pull-right"></i>Simple Action</a>
                        <a href="javascript:void(0)"><i class="gi gi-airplane pull-right"></i>Another Action</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-wrench fa-fw pull-right"></i>Separated Action</a>
                    </li>
                </ul>
            </div>
        </div>
        <h2>Block</h2>
    </div>

        <!-- Normal Form Block -->
        <div class="block">
            <!-- Normal Form Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    {{-- <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a> --}}
                </div>
                <h2><strong>Normal</strong> Form</h2>
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
            <form action="{{ route('produit.store') }}" method="post" enctype="multipart/form-data" class="form-group" id="form-validation">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="type_produit_id">Type de produit <span class="text-danger">*</span></label>
                            <select name="type_produit_id" id="type_produit_id" class="form-control select-chosen @error('type_produit_id') is-invalid @enderror" data-placeholder="Choisir un type de produit.." style="width: 250px; display: none;">
                                <option></option>
                                @foreach ($typeProduits as $item)
                                <option value="{{ $item->id }}">{{ $item->lib_type_produit }}</option>
                                @endforeach
                            </select>
                            @error('type_produit_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="lib_produit">Nom du produit <span class="text-danger">*</span></label>
                            <input type="text" id="lib_produit" name="lib_produit" class="form-control has-error @error('lib_produit') is-invalid @enderror" placeholder="Entrer le nom du produit">
                            @error('lib_produit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label class="control-label" for="cota">Cota <span class="text-danger">*</span></label>
                            <input type="text" id="cota" name="cota" class="form-control" placeholder="1">
                            @error('cota')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="photo">image du produit</label>
                            <input type="file" name="image_produit" required id="image_produit" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="prix_brut">Prix brut</label>
                            <input type="text" id="prix_brut" min="1" name="prix_brut" class="form-control @error('prix_brut') is-invalid @enderror" placeholder="1.0">
                            @error('prix_brut')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="poids">Poids(kilo)</label>
                            <input type="text" id="poids" min="1" name="poids" class="form-control" placeholder="Entrer le nombre de kilo">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="indice_legislatif">Montant par kilo</label>
                            <input type="text" id="indice_legislatif" name="indice_legislatif" class="form-control" placeholder="9000/kilo">
                            @error('indice_legislatif')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="taxe_charge">Taxe et charge</label>
                            <input type="hidden" name="taxe_charge" class="form-control mtaxecharge">
                            <input type="text" class="form-control mtaxecharge" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="prix_ttc">Prix TTC</label>
                            <input type="number" id="prix_ttc" min="1" name="prix_ttc" class="form-control">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><a href="#modal-terms" data-toggle="modal">Est disponible ?</a> <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <label class="switch switch-primary" for="estDisponible">
                                <input type="checkbox" id="estDisponible" name="estDisponible" value="1">
                                <span data-toggle="tooltip" title="Est disponible ?"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-10">
                        <div class="form-group">
                            <img src="" id="profile-img-tag" width="200px" />
                        </div>
                    </div>
                    {{-- <br><br><br> --}}
                    <div class="col-md-3">
                        <div class="form-group form-actions">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Valider</button>
                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Annuler</button>
                        </div>
                    </div>
                </div>

            </form>

            <!-- END Normal Form Content -->
        </div>
        <!-- END Normal Form Block -->

</div>
@endsection
@section('scripts')
<script src="{{ asset('template/js/pages/formsValidation.js') }}"></script>
<script>$(function(){ FormsValidation.init(); });</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
     function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image_produit").change(function(){
        readURL(this);
    });
    $("#indice_legislatif").blur(function(){
            var indicelegislatif = $(this).val();
            var nbrePoids =  $("#poids").val();
            if(indicelegislatif != "" && nbrePoids != ""){
                mtaxecharge = nbrePoids * indicelegislatif;
                // alert(mtaxecharge);
               $("input.mtaxecharge").val(mtaxecharge);
            }
        });

    // $(function () {
    //    $("#addProduit").on("submit", function(e){
    //     // flashAlert("Opération réussie","success","jair de papa");
    //         e.preventDefault();
    //             $.ajax({
    //                 url:"{{ route('produit.store') }}",
    //                 data:$("#addProduit").serialize(),
    //                 type:'post',
    //                 success:function(reponse){
    //                     if(reponse.code == 200){
    //                         flashAlert("Opération réussie","success",reponse.message);
    //                     }
    //                     else{
    //                         var outString = "<ul>";
    //                             for (const [key, value] of Object.entries(reponse.message)) {
    //                                 outString+= `<li style='text-align:left;color:red; list-style:disc !important; font-size:12px'>${value}</li>`;
    //                         }
    //                         outString += "</ul>";
    //                         flashAlert("Une erreur est suvernue","error",outString);
    //                     }
    //                 }
    //             });
    //    });
    // })


</script>
@endsection
