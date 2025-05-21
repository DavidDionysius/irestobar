<script>
    $(document).ready(function(){
        // CHOIX DE LA categorie
        $("#categorie").change(function(){
            let id_categorie = $(this).val()
            
            $.ajax({
                url: "selection_emballage.php",
                type: "post",
                data: {id_categorie: id_categorie},
                success: function(donnee){
                    $("#liste_emballage").html(donnee)
                }
            })
        })

        // ACTIVER ET DESACTIVER LES emballages
        $(document).on("click", ".sans_emballage", function(){
            let etat_sans_emballage = $("input[class='sans_emballage']").prop("checked"); //VERIFIER SI LA CASE EST COCHEE OU PAS
            if(etat_sans_emballage == true){
                $("input[class='emballage']").prop('disabled', true)
                $(".champ_unite").val("")
                $(".emballage").prop("checked", false)  //DECOCHER LES checkbox DE L'EMBALLAGE
                $(".unite_par_emballage").hide()
            }else{
                $("input[class='emballage']").prop('disabled', false)
            }
        })

        $(document).on("click", ".emballage", function(){
            let id_emballage = $(this).val()
            let cont_liste_unite = "#unite_par_emballage_" + id_emballage;

            let etat_emballage = $(this).prop("checked");
            if(etat_emballage == true){
                $(cont_liste_unite).show();
                $.ajax({
                    url: "selection_unite.php",
                    type: "post",
                    data: {id_emballage: id_emballage},
                    success: function(donnees){
                        $(cont_liste_unite).html(donnees);
                    }
                })
            }else{
                $(cont_liste_unite).hide();
            }
        })

        $("#bouton").click(function(){
            let nom_article = $("#nom_article").val()
            let id_categorie = $("#categorie").val()

            let tab_emballage = [];                         // array POUR STOCKER LES id_emballage
            let conteneur_qte_unite = "";                             // array POUR STOCKER LES unites DANS emballage
            $(".emballage:checked").each(function(cle){
                let id_emballage = $(this).val();           // RECUPERER id_emballage DANS CHECKBOX
                tab_emballage[cle] = id_emballage           // Ajouter CHAQUE id_emballage DANS array

                if(cle == 0){   //POUR LE PREMIER EMBALLAGE
                }else{
                    conteneur_qte_unite += ",";
                }

                let champ_unite = ".unite_" + id_emballage; // DEFINIR VALEUR DE LA class DANS CHAQUE emballage
                let verifier_unite_dans_conteneur = 0;  // LA VALEUR DE CETTE VARIABLE EST 0 S'IL N'Y A PAS ENCORE DE id_unite:quantite_unite_dans_emballage AJOUTE, SA VALEUR EST 1 DANS LE CAS CONTRAIRE
                $(champ_unite).each(function(cles){
                    let quantite_unite_dans_emballage = $(this).val()        //VALEUR DE CHAQUE unite
                    let id_unite = $(this).data("idunite")
                    if(quantite_unite_dans_emballage != ""){    // SI LA VALEUR DE CHAMPS POUR unité N'EST PAS VIDE
                        verifier_unite_dans_conteneur++;
                        if(cles == 0){      // POUR LA PREMIERE unite
                            conteneur_qte_unite += id_unite + ":" + quantite_unite_dans_emballage;
                        }else{
                            if(verifier_unite_dans_conteneur <= 1){
                                conteneur_qte_unite += id_unite + ":" + quantite_unite_dans_emballage;
                            }else{
                                conteneur_qte_unite += "/" + id_unite + ":" + quantite_unite_dans_emballage;
                            }
                        }
                    }
                })
            })

            if(nom_article != ""){
                if(tab_emballage != ""){
                    $.ajax({
                        url: "articles_enregistrer.php",
                        type: "post",
                        data: {
                            nom_article: nom_article,
                            id_categorie: id_categorie,
                            tab_emballage: tab_emballage,
                            conteneur_qte_unite: conteneur_qte_unite
                        },
                        success: function(donnees){
                            if(donnees == 1){
                                selection()
                            }else{
                                alert(donnees)
                            }
                        }
                    })
                }else{
                    alert("Veuillez sélectionner de l'unité dans un emballage")
                }
            }else{
                alert("Veuillez remplir le champ pour l'article")
            }
        })

        function selection(){
            $.get(
                "articles_selection.php",
                function(donnees){
                    $(".selection").html(donnees)
                }
            )
        }
        selection()

        // SUPPRESSION
        $(document).on("click", "#supprimer", function(){
            $(".cont_supprimer").show()
            let id = $(this).data("idarticle");
            let article = $(this).data("nomarticle");

            $.ajax({
                url: "articles_affiche_confirmation_supprimer.php",
                type: "post",
                data: {
                    id_article: id,
                    nom_article: article
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
            let id_article = $(this).data("id");

            $.ajax({
                url: "articles_supprimer.php",
                type: "post",
                data: {id: id_article},
                success: function(donnees){
                    if(donnees == 1){
                        selection()
                        $(".cont_supprimer").hide()
                    }
                }
            })
        })

        // MODIFIER
        $(document).on("click", "#modifier", function(){
            $(".cont_modifier").show();

            let id_article = $(this).data("idarticle");
            $.post(
                "articles_affiche_form_modifier.php",
                {id_article: id_article},
                function(donnees){
                    $(".cont_modifier").html(donnees)
                }
            )
        })

        $(document).on("click", "#fermer_modification", function(){
            $(".cont_modifier").hide();
        })

        // CHANGER DE categorie DANS LA MODIFICATION
        $(document).on("change", "#categorie_modifier", function(){
            let id_categorie = $(this).val()
            
            $.ajax({
                url: "selection_emballage_modifier.php",
                type: "post",
                data: {id_categorie: id_categorie},
                success: function(donnee){
                    $("#liste_emballage_modifier").html(donnee)
                }
            })
        })

        $(document).on("click", ".sans_emballage_modifier", function(){
            let etat_sans_emballage_modifier = $("input[class='sans_emballage_modifier']").prop("checked"); //VERIFIER SI LA CASE EST COCHEE OU PAS
            if(etat_sans_emballage_modifier == true){
                $("input[class='emballage_modifier']").prop('disabled', true)
                $(".champ_unite_modifier").val("")
                $(".emballage_modifier").prop("checked", false)  //DECOCHER LES checkbox DE L'EMBALLAGE
                $(".unite_par_emballage_modifier").hide()
            }else{
                $("input[class='emballage_modifier']").prop('disabled', false)
            }
        })

        $(document).on("click", ".emballage_modifier", function(){
            let id_emballage = $(this).val()
            let id_article = $(this).data("idarticle")
            let cont_liste_unite = "#unite_par_emballage_modifier_" + id_emballage;

            let etat_emballage = $(this).prop("checked");
            if(etat_emballage == true){
                $(cont_liste_unite).show();
                $.ajax({
                    url: "selection_unite_modifier.php",
                    type: "post",
                    data: {
                        id_emballage: id_emballage,
                        id_article: id_article
                    },
                    success: function(donnees){
                        $(cont_liste_unite).html(donnees);
                    }
                })
            }else{
                $(cont_liste_unite).hide();
            }
        })

        // MODIFICATION DE L'ARTICLE
        $(document).on("click", "#bouton_modifier", function(){
            let id_article = $(this).data("id");
            let nom_article_modifier = $("#article_modifier").val()
            let id_categorie = $("#categorie_modifier").val()

            let tab_emballage = [];                         // array POUR STOCKER LES id_emballage
            let conteneur_qte_unite = "";                             // array POUR STOCKER LES unites DANS emballage
            $(".emballage_modifier:checked").each(function(cle){
                let id_emballage = $(this).val();           // RECUPERER id_emballage DANS CHECKBOX
                tab_emballage[cle] = id_emballage           // Ajouter CHAQUE id_emballage DANS array

                if(cle == 0){   //POUR LE PREMIER EMBALLAGE
                }else{
                    conteneur_qte_unite += ",";
                }

                let champ_unite = ".unite_modifier_" + id_emballage; // DEFINIR VALEUR DE LA class DANS CHAQUE emballage
                let verifier_unite_dans_conteneur = 0;  // LA VALEUR DE CETTE VARIABLE EST 0 S'IL N'Y A PAS ENCORE DE id_unite:quantite_unite_dans_emballage AJOUTE, SA VALEUR EST 1 DANS LE CAS CONTRAIRE
                $(champ_unite).each(function(cles){
                    let quantite_unite_dans_emballage = $(this).val()        //VALEUR DE CHAQUE unite
                    let id_unite = $(this).data("idunite")
                    if(quantite_unite_dans_emballage != ""){    // SI LA VALEUR DE CHAMPS POUR unité N'EST PAS VIDE
                        verifier_unite_dans_conteneur++;
                        if(cles == 0){      // POUR LA PREMIERE unite
                            conteneur_qte_unite += id_unite + ":" + quantite_unite_dans_emballage;
                        }else{
                            if(verifier_unite_dans_conteneur <= 1){
                                conteneur_qte_unite += id_unite + ":" + quantite_unite_dans_emballage;
                            }else{
                                conteneur_qte_unite += "/" + id_unite + ":" + quantite_unite_dans_emballage;
                            }
                        }
                    }
                })
            })

            if(nom_article_modifier !== ""){
                if(tab_emballage != ""){
                    $.ajax({
                        url: "articles_modifier.php",
                        type: "post",
                        data: {
                            id_article: id_article,
                            nom_article_modifier: nom_article_modifier,
                            id_categorie: id_categorie,
                            tab_emballage: tab_emballage,
                            conteneur_qte_unite: conteneur_qte_unite
                        },
                        success: function(donnees){
                            if(donnees == 1){
                                $(".cont_modifier").hide();
                                selection()
                            }else{
                                alert(donnees)
                            }
                        }
                    })
                }else{
                    alert("Veuillez sélectionner de l'unité dans un emballage")
                }
            }else{
                alert("Veuillez remplir le champ pour l'article")
            }
        })
    })
</script>