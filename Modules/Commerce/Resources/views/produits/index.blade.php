@extends('layout.app')
@section('style')

@endsection
@section('contenu')

    <div class="block">


        <!-- All Products Block -->
        <div class="block full">
            <!-- All Products Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                </div>
                <h2><strong>Liste des articles</strong></h2>
            </div>
            <!-- END All Products Title -->

            <!-- All Products Content -->
            <table id="ecom-products" class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Article</th>
                        <th>Image</th>
                        <th>F/sseur</th>
                        <th>Commandé</th>
                        <th>Cota</th>
                        <th>Prix brut</th>
                        <th>Prix HT</th>
                        <th>Poids (kg)</th>
                        <th title="Taxe et Charge">TC</th>
                        <th>Prix TTC</th>
                        <th>Prix/vente</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($produits as $item)
                    <tr>
                        <td class="text-center"><a href="page_ecom_product_edit.html"><strong>{{ $i++ }}</strong></a></td>
                        <td class="hidden-xs">
                            <span class="label label-success">{{ $item->lib_produit }}</span>
                        </td>
                        <td class="text-center"><img width="80" height="80" src="{{ asset('storage/images/'.$item->photo) }}" alt="{{ $item->photo }}" class="img-circle"></td>
                        <td>{{ $item->fournisseur }}</td>
                        <td>{{ date("d-m-Y", strtotime($item->date_commande)) }}</td>
                        <td>{{ $item->cota }}</td>
                        <td>{{ $item->prix_brut }}</td>
                        <td>{{ $item->prix_hors_taxe }}</td>
                        <td>{{ $item->poids }}</td>
                        <td>{{ $item->taxe_charge }}</td>
                        <td>{{ $item->prix_ttc }}</td>
                        <td>{{ $item->prix_vente }}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="{{ route('produit.edit',$item->id) }}" data-toggle="tooltip" title="Modifier" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                            </div>
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- END All Products Content -->

        </div>
        <!-- END All Products Block -->

    </div>
@endsection
@section('scripts')

    <!-- Load and execute javascript code used only in this page -->
    <script src="{{ asset('template/js/pages/ecomProducts.js') }}"></script>
    <script>$(function(){ EcomProducts.init(); });</script>
    <script>

        $(function(){

        });
      </script>
@endsection

