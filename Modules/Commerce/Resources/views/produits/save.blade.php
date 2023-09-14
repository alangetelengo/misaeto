  $(function(){
        var type_produit_id = $("#type_produit_id");
        var lib_produit = $("#lib_produit");
        var profile-img = $("#profile-img");
        var cota = $("#cota");
        var prix_brut = $("#prix_brut");
        var prix_hors_taxe = $("#prix_hors_taxe");
        var poids = $("#poids");
        var indice_legislatif = $("#indice_legislatif");
        var taxe_charge = $("#taxe_charge");
        var prix_ttc = $("#prix_ttc");
        var estDisponible = $("#estDisponible");
       data = {
        type_produit_id:type_produit_id.val(),
        lib_produit:lib_produit.val(),
        profile-img:profile-img.val(),
        cota:cota.val(),
        prix_brut:prix_brut.val(),
        prix_hors_taxe:prix_hors_taxe.val(),
        poids:poids.val(),
        indice_legislatif:indice_legislatif.val(),
        taxe_charge:taxe_charge.val(),
        prix_ttc:prix_ttc.val(),
        estDisponible:estDisponible.val()
       }
       //06 8557876
        //  notification("error","Je suis un message d'erreur");
        // flashAlert("Réponse","error","<h2>Je suis un message d'erreur</h2>");
        $('#addProduit').on('submit', function(e){
            e.preventDefault();
            
           $.post("{{ route('produit.store') }}", data:data, function(reponse){
            flashAlert("Opération réussie","success",response.message);
                // if(response.code == "200")
                // {
                //     flashAlert("Opération réussie","success",response.message);
                //     // var url = "";
                //     // setTimeout(() => {
                //     //     // window.open(url);
                //     // }, 4000);
                // }else{
                //     var outString = "<ul>";
                //         for (const [key, value] of Object.entries(response.message))
                //         {
                //         outString+= `<li style='text-align:left;color:red; list-style:disc !important; font-size:12px'>${value}</li>`;
                //         }
                //     outString += "</ul>";
                //     flashAlert("Une erreur est suvernue","error",outString);
                // }

           });
        });
    });