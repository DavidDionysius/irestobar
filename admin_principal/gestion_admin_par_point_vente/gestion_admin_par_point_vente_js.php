<script>
    $(document).ready(function(){
        $("#bouton").click(function(){
            let id_point_vente_url = $("#id_point_vente_url").val()
            let prenom = $("#prenom").val();
            let nom = $("#nom").val();
            let jour_naissance = $("#jour_naissance").val();
            let mois_naissance = $("#mois_naissance").val();
            let annee_naissance = $("#annee_naissance").val();
            let cin = $("#cin").val();
            let adresse = $("#adresse").val();
            let nume_phone = $("#nume_phone").val();
            let mot_passe = $("#mot_passe").val();
            let confirm_mot_passe = $("#confirm_mot_passe").val();

            if(prenom != "" && jour_naissance != "" && mois_naissance != "" && annee_naissance != "" && cin != "" && adresse != "" && nume_phone != "" && mot_passe != "" && confirm_mot_passe != ""){
                $.ajax({
                    url: "gestion_admin_par_point_vente_enregistrement.php",
                    type: "post",
                    data: {
                        id_point_vente_url: id_point_vente_url,
                        prenom: prenom,
                        nom: nom,
                        jour_naissance: jour_naissance,
                        mois_naissance: mois_naissance,
                        annee_naissance: annee_naissance,
                        cin: cin,
                        adresse: adresse,
                        nume_phone: nume_phone,
                        mot_passe: mot_passe,
                        confirm_mot_passe: confirm_mot_passe
                    },
                    success: function(donnees){
                        if(donnees == 1){
                            selection()
                            $("#prenom").val("");
                            $("#nom").val("");
                            $("#jour_naissance").val(1);
                            $("#mois_naissance").val("Janvier");
                            $("#annee_naissance").val("");
                            $("#cin").val("");
                            $("#adresse").val("");
                            $("#nume_phone").val("");
                            $("#mot_passe").val("");
                            $("#confirm_mot_passe").val("");
                        }
                    }
                })
            }else{
                alert("Seulement le nom peut être vide")
            }
        })

        // SELECTION
        function selection(){
            let id_point_vente = $("#id_point_vente_url").val();

            $.ajax({
                url: "gestion_admin_par_point_vente_selection.php",
                type: "post",
                data: {id: id_point_vente},
                success: function(donnees){
                    $(".selection").html(donnees)
                }
            })
        }
        selection()

        // MODIFICATION (14-04-2025)
        $(document).on("click", "#modifier", function(){
            // ANY ANATY gestion_admin_par_point_vente_selection.php NO MISY IO bouton modifier io 
            $(".conteneur_modification").show()
            let id_point_vente = $(this).data("id");

            $.ajax({
                url: "gestion_admin_par_point_vente_affiche_form_modification.php",
                type: "post",
                data: {id: id_point_vente},
                success: function(data){
                    $(".conteneur_modification").html(data)
                    // ANATY gestion_admin_par_point_vente.php NO MISY IO DIV conteneur_modification IO
                }
            })
        })

        $(document).on("click", "#fermer", function(){
            $(".conteneur_modification").hide()
        })

 // SUPPRESSION KETRIKA SEUL
 $(document).on("click", "#supprimer", function(){
                $(".cont_supprimer").show()
                let id = $(this).data("id");
                let admin_point_vente = $(this).data("adminpointvente");

                $.ajax({
                    url: "gestion_admin_par_point_vente_affiche_confirmation_supprimer.php",
                    type: "post",
                    data: {
                        id_admin_point_vente: id,
                        admin_point_vente: admin_point_vente
                    },
                    success: function(donnees){
                        $(".cont_supprimer").html(donnees)
                    }
                })
            })

// FIN SUPPRESSION KETRIKA SEUL

        // KETRIKA SEUL
        $(document).on("click", "#bouton", function(){
                let nouveau_prenom = $("#prenom_modifier").val()
                let nouveau_nom = $("#nom_modifier").val()
                let nouveau_jour_naissance = $("#jour_naissance_modifier").val()
                let nouveau_mois_naissance = $("#mois_naissance_modifier").val()
                let nouveau_annee_naissance = $("#annee_naissance_modifier").val()
                let nouveau_cin = $("#cin_modifier").val()
                let nouveau_adresse = $("#adresse_modifier").val()
                let nouveau_num_phone = $("#nume_phone_modifier").val()

                let id = $(this).data("id")
                
                $.ajax({
                    url: "gestion_admin_par_point_vente_modifier.php",
                    type: "post",
                    data: {
                        nouv_prenom: nouveau_prenom,
                        nouv_nom: nouveau_nom,
                        nouv_jour_naissance: nouveau_jour_naissance,
                        nouv_mois_naissance: nouveau_mois_naissance,
                        nouv_annee_naissance: nouveau_annee_naissance,
                        nouv_cin: nouveau_cin,
                        nouv_adresse: nouveau_adresse,
                        nouv_num_phone: nouveau_num_phone,
                        id: id
                    },
                    success: function(donnees){
                        if(donnees == 1){
                            $(".conteneur_modification").hide();
                            selection()
                        }
                    }
                })
            })

        
            $(document).on("click", "#refuser", function(){
                $(".cont_supprimer").hide()
            })

            $(document).on("click", "#accepter", function(){
                let id_admin_point_vente = $(this).data("id");

                $.ajax({
                    url: "gestion_admin_par_point_de_vente_supprimer.php",
                    type: "post",
                    data: {id: id_admin_point_vente},
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