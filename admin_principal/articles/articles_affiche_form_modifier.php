<?php
include("../../bdd/connexion.php");
$id_article = $_POST["id_article"];

// Selection du nom de categorie
$slct_categorie = $connexion -> prepare("SELECT nom_article, id_categorie, id_emballage, quantite_unites FROM articles WHERE id = :id");
$slct_categorie -> execute([
    "id" => $id_article
]);
$tab_categorie = $slct_categorie -> fetch();
$nom_article = $tab_categorie["nom_article"];
$id_categorie_selectionne = $tab_categorie["id_categorie"];
$id_emballage = $tab_categorie["id_emballage"];
$quantite_unites = $tab_categorie["quantite_unites"];

$affiche = "<div id='formulaire_modifier'>
                <button id='fermer_modification'>X</button>
                <div>
                    <label for='' id='alignement_droit'>Nom de la categorie : </label>
                    <input type='text' id='categorie_modifier' value='{$nom_article}' />
                </div>

                <div>
                    <label for='' id='alignement_droit'>Catégorie : </label>
                    <select id='categorie_modifier'>";
                        $slct_categorie = $connexion -> prepare("SELECT * FROM categorie ORDER BY id ASC");
                        $slct_categorie -> execute();
                        $tab_slct_categorie = $slct_categorie -> fetchAll();
                        $nb_tab = count($tab_slct_categorie);
                        for($i = 0; $i < $nb_tab; $i++){
                            $id_categorie = $tab_slct_categorie[$i]["id"];
                            $categorie = $tab_slct_categorie[$i]["nom_categorie"];
                            if($id_categorie_selectionne == $id_categorie){
                                $affiche .= "<option value='{$id_categorie}' selected>{$categorie}</option>";

                                // SELECTION DES unites DANS emballage
                            }else{
                                $affiche .= "<option value='{$id_categorie}'>{$categorie}</option>";
                            }
                            
                        }
                    $affiche .= "</select>
                </div>
                <div id='cont_emballage_modifier'>
                    <label for='' id='alignement_droit'>Emballage : </label>
                    <div id='liste_emballage_modifier'>
                        <label id='label_sans_emballage'><input type='checkbox' value='0' class='sans_emballage_modifier'  /> Sans emballage</label>";
                        $tab_emballage = explode(",", $id_emballage);   //TRANSFORMER EN array LE $id_emballage

                        // SELECTIONNER TOUS LES emballages DANS le $id_categorie
                        $slct_emballage = $connexion -> prepare("SELECT id, nom_emballage FROM emballage WHERE id_categorie = :id_categorie");
                        $slct_emballage -> execute([
                            "id_categorie" => $id_categorie_selectionne
                        ]);
                        $tab_emballage_selectionne = $slct_emballage -> fetchAll();
                        for($i_emballage = 0; $i_emballage < count($tab_emballage_selectionne); $i_emballage++){
                            $id_emballage_selectionne = $tab_emballage_selectionne[$i_emballage]["id"];
                            $nom_emballage_selectionne = $tab_emballage_selectionne[$i_emballage]["nom_emballage"];
                            $index_emballage = array_search($id_emballage_selectionne, $tab_emballage);
                            
                            $affiche .= "<label>";
                                            if(in_array($id_emballage_selectionne, $tab_emballage)){
                                                $affiche .= "<input type='checkbox' value='{$id_emballage}' checked>";
                                            }else{
                                                $affiche .= "<input type='checkbox' value='{$id_emballage}'> ";
                                            }
                                            $affiche .= "{$nom_emballage_selectionne}
                                        </label>";
                                        if(in_array($id_emballage_selectionne, $tab_emballage)){
                                            $slct_unite = $connexion -> prepare("SELECT id, nom_unite FROM unite WHERE id_emballage = :id_emballage");
                                            $slct_unite -> execute([
                                                "id_emballage" => $id_emballage_selectionne
                                            ]);
                                            $tab_slct_unite = $slct_unite -> fetchAll();

                                            $tab_unite = explode(",", $quantite_unites);
                                            $partie_unite = $tab_unite[$index_emballage];

                                            $tab_unite_dans_emballage = explode("/", $partie_unite);

                                            for($i_unite = 0; $i_unite < count($tab_slct_unite); $i_unite++){
                                                $id_unite = $tab_slct_unite[$i_unite]["id"];
                                                $nom_unite = $tab_slct_unite[$i_unite]["nom_unite"];
                                                
                                                $tab_unite_selectionne = [];    //TABLEAU VIDE POUR STOCKER LES id DE L'unite DANS emballage
                                                for($i_unite_dans_emballage = 0; $i_unite_dans_emballage < count($tab_unite_dans_emballage); $i_unite_dans_emballage++){
                                                    $id_et_qte_unite = $tab_unite_dans_emballage[$i_unite_dans_emballage];
                                                    $tab_id_qte_unite = explode(":", $id_et_qte_unite);
                                                    $id_unite_dans_emballage = $tab_id_qte_unite[0];
                                                    $qte_unite_dans_emballage = $tab_id_qte_unite[1];

                                                    $tab_unite_selectionne[$i_unite_dans_emballage] = $id_unite_dans_emballage;
                                                }

                                                $affiche .= "<div id='cont_unite_mod'>
                                                                <label>{$nom_unite} : </label>";
                                                                if(in_array($id_unite, $tab_unite_selectionne)){
                                                                    $index_unite = array_search($id_unite, $tab_unite_selectionne);

                                                                    $id_qte_unite_2 = $tab_unite_dans_emballage[$index_unite];
                                                                    $tab_id_qte_unite_2 = explode(":", $id_qte_unite_2);
                                                                    $id_unite_2 = $tab_id_qte_unite_2[0];
                                                                    $qte_unite_2 = $tab_id_qte_unite_2[1];
                                                                    $affiche .= "<input type='number' value='{$qte_unite_2}' />";
                                                                }else{
                                                                    $affiche .= "<input type='number' />";
                                                                }
                                                                
                                                $affiche .= "</div>";
                                            }
                                        }
                        }
                    $affiche .= "
                    </div>
                </div>

                <div>
                    <button id='bouton_modifier' data-id='{$id_article}'>ENREGISTRER</button>
                </div>
            </div>";
echo $affiche;