 <!-- Quick Stats -->
 {{-- <div class="col-md-12 text-left">
    <div class="block-section">

        <a type="button" class="btn btn-sm btn-success" style="padding:5px;font-size:18px;margin-right:10px;" href="#"  style="color:white;height:35px;font-size:17px;">Ajouter une fiche&nbsp;</a>

        <a type="button" class="btn btn-sm btn-warning" style="padding:5px;font-size:18px;margin-right:10px;" href="#"  style="color:white;height:35px;font-size:17px;">Rafraichir la liste</a>

        <a type="button" class="btn btn-sm btn-danger" style="padding:5px;font-size:18px;margin-right:10px;" href="#"  style="color:white;height:35px;font-size:17px;">Toutes mes fiches saisies</a>

        <a type="button" class="btn btn-sm btn-success" style="padding:5px;font-size:18px;margin-right:10px;" href="{{URL::to('produit.create')}}"  style="color:white;height:35px;font-size:17px;">Mes statistiques</a>


    </div>
</div> --}}


 <div class="row text-center">
    <div class="col-sm-6 col-lg-3">
        <form action="" method="post"></form>
        <a href="javascript:void(0)" class="widget widget-hover-effect2 addproduct">
            <div class="widget-extra themed-background-success">
                <h4 class="widget-content-light"><strong>Ajouter un nouveau</strong> Produit</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2 addcdeClt">
            <div class="widget-extra themed-background-warning">
                <h4 class="widget-content-light"><strong>Commande de </strong> client</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{ App\Models\CommandeClient::all()->count() }}</span></div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-warning">
                <h4 class="widget-content-light"><strong>En rupture de</strong> Stock</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 text-danger animation-expandOpen">71</span></div>
        </a>
    </div>

    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2 allproducts">
            <div class="widget-extra themed-background-dark">
                <h4 class="widget-content-light"><strong>Tous les</strong> Produits</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{ App\Models\Produit::all()->count() }}</span></div>
        </a>
    </div>
</div>
<!-- END Quick Stats -->
