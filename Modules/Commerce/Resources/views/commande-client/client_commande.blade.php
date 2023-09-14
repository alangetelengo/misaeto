@extends('layout.app')
@section('style')
<script src="{{ asset('template/js/jquery-3.5.1.min.js') }}"></script>

@endsection
@section('contenu')

<div class="block">
    <div class="row">
        <div class="col-lg-4">
            <!-- Customer Info Block -->
            <div class="block">
                <!-- Customer Info Title -->
                <div class="block-title">
                    <h2><i class="fa fa-file-o"></i> <strong>Informations du Client</strong></h2>
                </div>
                <!-- END Customer Info Title -->

                <!-- Customer Info -->
                <div class="block-section text-center">
                    <a href="javascript:void(0)">
                        <img src="img/placeholders/avatars/avatar4@2x.jpg" alt="avatar" class="img-circle">
                    </a>
                    <h3>
                        <strong>{{ $client->nomComplet() }}</strong><br><small></small>
                    </h3>
                </div>
                <table class="table table-borderless table-striped table-vcenter">
                    <tbody>
                        <tr>
                            <td class="text-right" style="width: 50%;"><strong>Titre Social</strong></td>
                            <td>{{ $client->sexe == "M" ? "Mr." : "Mme." }}  </td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Contact</strong></td>
                            <td>{{ $client->telephone }}</td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Statut</strong></td>
                            <td><span class="label label-success"><i class="fa fa-check"></i> Active</span></td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Customer Info -->
            </div>
            <!-- END Customer Info Block -->
        </div>
        <div class="col-lg-8">
            <div class="block">
                <!-- Products in Cart Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <span class="label label-success"><strong>@money( $client->commandeClients->sum("taxe_charge_payer"))</strong></span>
                    </div>
                    <h2><i class="fa fa-shopping-cart"></i> <strong>Produits</strong> dans le panier ({{ $client->commandeClients->sum("quantite_produit") }})</h2>
                </div>
                <!-- END Products in Cart Title -->

                <!-- Products in Cart Content -->
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <th><strong>Nom du produit</strong></th>
                        <th><strong>Quantité</strong></th>
                        <th><strong>action</strong></th>
                    </thead>
                    <tbody>
                        @forelse ($client->commandeClients as $item)
                        <tr>
                            <td><span class="label label-success">{{ $item->produit->lib_produit }}</span></td>
                            <td><span class="label label-info">{{ $item->quantite_produit }}</span></td>
                            <td class="text-center" style="width: 70px;">
                                <a href="{{ $item->id }}" data-toggle="tooltip" title="Annuler ce produit" class="btn btn-xs btn-default" data-original-title="Annuler"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @empty
                        <span class="label label-danger"><strong>Aucune donnée</strong></span>
                        @endforelse
                    </tbody>
                </table>
                <!-- END Products in Cart Content -->
            </div>
        </div>
    </div>
</div>

@endsection

@section("scripts")

@endsection

