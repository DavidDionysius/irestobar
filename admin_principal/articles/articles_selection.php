<?php
include("../../bdd/connexion.php");

$slct_categorie = $connexion -> prepare("SELECT * FROM categorie ORDER BY id ASC");
$slct_categorie -> execute();
$tab_slct_categorie = $slct_categorie -> fetchAll();

$reponse = "";

for($i_categorie = 0; $i_categorie < count($tab_slct_categorie); $i_categorie++){
    $id_categorie = $tab_slct_categorie[$i_categorie]["id"];
    $nom_categorie = $tab_slct_categorie[$i_categorie]["nom_categorie"];

    $reponse .= "<table border='1' id='tableau'>
                    <caption>{$nom_categorie}</caption>
                    <tr>
                        <th id='thArticle'>Nom de l'article</th>
                        <th id='thEmballage'>Emballage</th>
                        <th id='thUnite'>Unités (quantité dans emballage) </th>
                        <th id='thActions'>Actions</th>
                    </tr>";

                    // SELECTION articles
                    $slct_article = $connexion -> prepare("SELECT id, nom_article, id_emballage, quantite_unites FROM articles WHERE id_categorie = :categorie");
                    $slct_article -> execute([
                        "categorie" => $id_categorie
                    ]);
                    $tab_article = $slct_article -> fetchAll();
                    for($i_article = 0; $i_article < count($tab_article); $i_article++){
                        $id_article = $tab_article[$i_article]["id"];
                        $nom_article = $tab_article[$i_article]["nom_article"];
                        $id_emballage = $tab_article[$i_article]["id_emballage"];
                        $qte_unites = $tab_article[$i_article]["quantite_unites"];

                        // NOMBRES EMBALLAGES
                        $tab_emballage = explode(",", $id_emballage);   // TRANFORMER EN array LE $id_emballage
                        $nb_emballage = count($tab_emballage);

                        $id_emballage_1 = $tab_emballage[0];    // PREMIER emballage
                        
                        // PRENDRE LES unites DANS PREMIER emballage
                        $tab_unites = explode(",", $qte_unites);
                        $premiere_liste_unites = $tab_unites[0];

                        // COMPTER LE NOMBRE D'unite DANS emballage POUR DONNER UN rowspan DANS articles
                        $rowpan_pour_article = 0;
                        for($i_rowspan_article = 0; $i_rowspan_article < $nb_emballage; $i_rowspan_article++){
                            $unites_article = $tab_unites[$i_rowspan_article];
                            $tab_unite_article = explode("/", $unites_article);
                            $nb_unite_article = count($tab_unite_article);
                            if($nb_unite_article == 0){
                                $nb_unite_article = 1;
                            }
                            $rowpan_pour_article += $nb_unite_article;
                        }

                        // unites DANS emballage
                        $tab_premiere_liste_unites = explode("/", $premiere_liste_unites);
                        $nb_premiere_liste_unites = count($tab_premiere_liste_unites);
                        if($nb_premiere_liste_unites == 0){
                            $nb_premiere_liste_unites = 1;
                        }

                        // PREMIERE UNITE
                        $premiere_unite = $tab_premiere_liste_unites[0];
                        $tab_premiere_unite = explode(":", $premiere_unite);
                        $id_unite = $tab_premiere_unite[0];
                        $qte_unite_dans_emballage = $tab_premiere_unite[1];

                        // SELECTIONNER LE nom_unite
                        $slct_unite = $connexion -> prepare("SELECT nom_unite FROM unite WHERE id = :id_unite");
                        $slct_unite -> execute([
                            "id_unite" => $id_unite
                        ]);
                        $ligne_unite = $slct_unite -> fetch();
                        $nom_unite = $ligne_unite["nom_unite"];

                        $slct_nom_emballage_1 = $connexion -> prepare("SELECT nom_emballage FROM emballage WHERE id = :id_emballage");
                        $slct_nom_emballage_1 -> execute([
                            "id_emballage" => $id_emballage_1
                        ]);
                        $ligne_emballage = $slct_nom_emballage_1 -> fetch();
                        $nom_emballage_1 = $ligne_emballage["nom_emballage"];

                        $reponse .= "<tr>
                                        <td rowspan='{$rowpan_pour_article}' class='espace_gauche'>{$nom_article}</td>
                                        <td rowspan='{$nb_premiere_liste_unites}' class='espace_gauche'>{$nom_emballage_1}</td>
                                        <td class='espace_gauche'>{$nom_unite} ($qte_unite_dans_emballage)</td>
                                        <td rowspan='{$rowpan_pour_article}' id='td_actions'>
                                            <button id='modifier' data-idarticle='{$id_article}'>MODIFIER</button>
                                            <button id='supprimer' data-idarticle='{$id_article}' data-nomarticle='{$nom_article}'>SUPPRIMER</button>
                                        </td>
                                    </tr>";

                        // A PARTIR DE 2è unite DANS PREMIER emballage
                        for($i_unite = 1; $i_unite < $nb_premiere_liste_unites; $i_unite++){
                            $unite_2 = $tab_premiere_liste_unites[$i_unite];

                            $tab_premiere_unite = explode(":", $unite_2);
                            $id_unite_2 = $tab_premiere_unite[0];
                            $qte_unite_dans_emballage_2 = $tab_premiere_unite[1];

                            // SELECTIONNER LE nom_unite
                            $slct_unite_2 = $connexion -> prepare("SELECT nom_unite FROM unite WHERE id = :id_unite");
                            $slct_unite_2 -> execute([
                                "id_unite" => $id_unite_2
                            ]);
                            $ligne_unite_2 = $slct_unite_2 -> fetch();
                            $nom_unite_2 = $ligne_unite_2["nom_unite"];

                            $reponse .= "<tr>
                                            <td class='espace_gauche'>{$nom_unite_2} ($qte_unite_dans_emballage_2)</td>
                                        </tr>";
                        }

                        // A PARTIR DE 2è EMBALLAGE
                        for($i_emballage_2 = 1; $i_emballage_2 < $nb_emballage; $i_emballage_2++){
                            $id_emballage_2 = $tab_emballage[$i_emballage_2];

                            // PRENDRE LES unites A PARTIR DE 2è emballage
                            $liste_unite_2 = $tab_unites[$i_emballage_2];

                            // unites DANS emballage
                            $tab_premiere_liste_unites_2 = explode("/", $liste_unite_2);
                            $nb_premiere_liste_unites_2 = count($tab_premiere_liste_unites_2);
                            if($nb_premiere_liste_unites_2 == 0){
                                $nb_premiere_liste_unites_2 = 1;
                            }

                            // PREMIERE UNITE
                            $premiere_unite_2 = $tab_premiere_liste_unites_2[0];
                            $tab_premiere_unite_2 = explode(":", $premiere_unite_2);
                            $id_unite_2 = $tab_premiere_unite_2[0];
                            $qte_unite_dans_emballage = $tab_premiere_unite_2[1];

                            // SELECTIONNER LE nom_unite
                            $slct_unite_1 = $connexion -> prepare("SELECT nom_unite FROM unite WHERE id = :id_unite");
                            $slct_unite_1 -> execute([
                                "id_unite" => $id_unite_2
                            ]);
                            $premiere_ligne_unite_2 = $slct_unite_1 -> fetch();
                            $premier_nom_unite_2 = $premiere_ligne_unite_2["nom_unite"];
                            // FIN DE PREMIER EMBALLAGE

                            $slct_nom_emballage_2 = $connexion -> prepare("SELECT nom_emballage FROM emballage WHERE id = :id_emballage");
                            $slct_nom_emballage_2 -> execute([
                                "id_emballage" => $id_emballage_2
                            ]);
                            $ligne_emballage_2 = $slct_nom_emballage_2 -> fetch();
                            $nom_emballage_2 = $ligne_emballage_2["nom_emballage"];

                            $reponse .= "<tr>
                                            <td rowspan='{$nb_premiere_liste_unites_2}' class='espace_gauche'>{$nom_emballage_2}</td>
                                            <td class='espace_gauche'>{$premier_nom_unite_2} ({$qte_unite_dans_emballage})</td>
                                        </tr>";

                            // A PARTIR DE 2è unite DANS PREMIER emballage
                            for($i_unite_2 = 1; $i_unite_2 < $nb_premiere_liste_unites; $i_unite_2++){
                                $unite_3 = $tab_premiere_liste_unites_2[$i_unite_2];

                                $tab_premiere_unite = explode(":", $unite_3);
                                $id_unite_3 = $tab_premiere_unite[0];
                                $qte_unite_dans_emballage_3 = $tab_premiere_unite[1];

                                // SELECTIONNER LE nom_unite
                                $slct_unite_3 = $connexion -> prepare("SELECT nom_unite FROM unite WHERE id = :id_unite");
                                $slct_unite_3 -> execute([
                                    "id_unite" => $id_unite_3
                                ]);
                                $ligne_unite_3 = $slct_unite_3 -> fetch();
                                $nom_unite_3 = $ligne_unite_3["nom_unite"];

                                $reponse .= "<tr>
                                                <td class='espace_gauche'>{$nom_unite_3} ($qte_unite_dans_emballage_3)</td>
                                            </tr>";
                            }
                        }
                    }

    $reponse .= "</table>";
}

echo $reponse;