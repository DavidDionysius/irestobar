<script>
    $(document).ready(function(){
        // Enregistrement dans la BDD
        $("#bouton").click(function(){  //Cliquer sur le bouton ENREGISTRER
            // Récuperation de valeur dans lea champ de saisie
            let emballage = $("#emballage").val()
            let categorie = $("#categorie").val()
            
            $.ajax({
                url: "emballage_enregistrer.php",
                type: "post",
                data: {
                    nom_emballage: emballage,
                    id_categorie: categorie
                },
                success: function(donnees){
                    if(donnees == 1){
                        selection()
                        $("#emballage").val("")
                    }else{
                        alert(donnees)
                    }
                }
            })
        })

        // Selection dans la BDD
        function selection(){
            $.ajax({
                url: "emballage_selectionner.php",
                type: "get",
                success: function(donnees){
                    $(".selection").html(donnees)
                }
            })
        }

        selection()

        // MODIFIER
        $(document).on("click", "#modifier", function(){
            $(".cont_modifier").show();

            let id = $(this).data("id");
            $.ajax({
                url: "emballage_affiche_form_modifier.php",
                type: "post",
                data: {id_emballage: id},
                success: function(donnees){
                    $(".cont_modifier").html(donnees)
                }
            })
        })

        $(document).on("click", "#fermer_modification", function(){
            $(".cont_modifier").hide();
        })

        $(document).on("click", "#bouton_modifier", function(){
            let nouveau_point_vente = $("#emballage_modifier").val()
            let id = $(this).data("id")
            
            $.ajax({
                url: "emballage_modifier.php",
                type: "post",
                data: {
                    point_vente: nouveau_point_vente,
                    id_point_vente: id
                },
                success: function(donnees){
                    if(donnees == 1){
                        $(".cont_modifier").hide();
                        selection()
                    }
                }
            })
        })

        // SUPPRESSION
        $(document).on("click", "#supprimer", function(){
            $(".cont_supprimer").show()
            let id = $(this).data("id");
            let emballage = $(this).data("emballage");

            $.ajax({
                url: "emballage_affiche_confirmation_supprimer.php",
                type: "post",
                data: {
                    id_emballage: id,
                    nom_emballage: emballage
                },
                success: function(donnees){
                    $(".cont_supprimer").html(donnees)
                }
            })
        })

        $(document).on("click", "#refuser", function(){
            $(".cont_supprimer").hide()
        })

        $(document).on("click", "#accepter", function(){
            let id_point_vente = $(this).data("id");

            $.ajax({
                url: "emballage_supprimer.php",
                type: "post",
                data: {id: id_point_vente},
                success: function(donnees){
                    if(donnees == 1){
                        selection()
                        $(".cont_supprimer").hide()
                    }
                }
            })
        })

        // AJOUTER UNE UNITE
        $(document).on("click", "#ajouter_unite", function(){
            $(".cont_ajout_unite").show();

            let id_categorie = $(this).data("idcategorie");
            let id_emballage = $(this).data("idemballage");
            let emballage = $(this).data("emballage");
            $.ajax({
                url: "emballage_affiche_form_ajout_unite.php",
                type: "post",
                data: {
                    id_categorie: id_categorie,
                    id_emballage: id_emballage,
                    emballage: emballage
                },
                success: function(donnees){
                    $(".cont_ajout_unite").html(donnees)
                }
            })
        })

        $(document).on("click", "#fermer_modification_ajout_unite", function(){
            $(".cont_ajout_unite").hide();
        })

        $(document).on("click", "#bouton_ajouter_unite", function(){
            let nouvelle_unite = $("#nouvelle_unite").val()
            let id_categorie = $(this).data("idcategorie")
            let id_emballage = $(this).data("idemballage")
            
            $.ajax({
                url: "emballage_ajouter_unite.php",
                type: "post",
                data: {
                    nouvelle_unite: nouvelle_unite,
                    id_categorie: id_categorie,
                    id_emballage: id_emballage
                },
                success: function(donnees){
                    if(donnees == 1){
                        $(".cont_ajout_unite").hide();
                        selection()
                    }else{
                        alert(donnees)
                    }
                }
            })
        })

        // SUPPRESSION UNITE (29/04/2025)
        $(document).on("click", "#supprimer_unite", function(){
            let id_emballage = $(this).data("idemballage");
            let id_unite = $(this).data("idunite");
            let nom_unite = $(this).data("nomunite");

            $(".cont_supprimer_unite").show()

            $.ajax({
                url: "unite_affiche_confirmation_supprimer.php",
                type: "post",
                data: {
                    id_unite: id_unite,
                    nom_unite: nom_unite
                },
                success: function(donnees){
                    $(".cont_supprimer_unite").html(donnees)
                }
            })
        })

        $(document).on("click", "#refuser_suppression_unite", function(){
            $(".cont_supprimer_unite").hide()
        })

        $(document).on("click", "#accepter_suppression_unite", function(){
            let id_unite = $(this).data("idunite");

            $.ajax({
                url: "unite_supprimer.php",
                type: "post",
                data: {
                    id_unite: id_unite
                },
                success: function(donnees){
                    if(donnees == 1){
                        selection()
                        $(".cont_supprimer_unite").hide()
                    }else{
                        alert(donnees)
                    }
                }
            })
        })

        // MODIFIER UNITES
        $(document).on("click", "#modifier_unite", function(){
            $(".cont_modifier_unite").show();

            let id_unite = $(this).data("idunite");
            let nom_unite = $(this).data("nomunite");
            $.ajax({
                url: "unite_affiche_form_modifier.php",
                type: "post",
                data: {
                    id_unite: id_unite,
                    nom_unite: nom_unite
                },
                success: function(donnees){
                    $(".cont_modifier_unite").html(donnees)
                }
            })
        })

        $(document).on("click", "#fermer_modification_unite", function(){
            $(".cont_modifier_unite").hide();
        })

        $(document).on("click", "#bouton_modifier_unite", function(){
            let id_unite = $(this).data("idunite");
            let nouvelle_unite = $(".nouvelle_unite").val()
            
            $.ajax({
                url: "unite_modifier.php",
                type: "post",
                data: {
                    id_unite: id_unite,
                    nouvelle_unite: nouvelle_unite
                },
                success: function(donnees){
                    if(donnees == 1){
                        $(".cont_modifier_unite").hide();
                        selection()
                    }
                }
            })
        })
    })
</script>