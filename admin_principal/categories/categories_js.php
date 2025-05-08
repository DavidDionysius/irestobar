<script>
    $(document).ready(function(){
        // Enregistrement dans la BDD
        $("#bouton").click(function(){  //Cliquer sur le bouton ENREGISTRER
            // Récuperation de valeur dans lea champ de saisie
            let categorie = $("#categorie").val()
            
            $.ajax({
                url: "categories_enregistrer.php",
                type: "post",
                data: {nom_categorie: categorie},
                success: function(donnees){
                    if(donnees == 1){
                        selection()
                        $("#categorie").val("")
                    }else{
                        alert(donnees)
                    }
                }
            })
        })

        // Selection dans la BDD
        function selection(){
            $.ajax({
                url: "categories_selectionner.php",
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
                url: "categories_affiche_form_modifier.php",
                type: "post",
                data: {id_categorie: id},
                success: function(donnees){
                    $(".cont_modifier").html(donnees)
                }
            })
        })

        $(document).on("click", "#fermer_modification", function(){
            $(".cont_modifier").hide();
        })

        $(document).on("click", "#bouton_modifier", function(){
            let nouvelle_categorie = $("#categorie_modifier").val()
            let id = $(this).data("id")
            
            $.ajax({
                url: "categories_modifier.php",
                type: "post",
                data: {
                    nouv_categorie: nouvelle_categorie,
                    id_categorie: id
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
            let categorie = $(this).data("categorie");

            $.ajax({
                url: "categories_affiche_confirmation_supprimer.php",
                type: "post",
                data: {
                    id_categorie: id,
                    nom_categorie: categorie
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
            let id_categorie = $(this).data("id");

            $.ajax({
                url: "categories_supprimer.php",
                type: "post",
                data: {id: id_categorie},
                success: function(donnees){
                    if(donnees == 1){
                        selection()
                        $(".cont_supprimer").hide()
                    }
                }
            })
        })
    })
</script>