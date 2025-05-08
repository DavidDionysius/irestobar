<?php
include("../../bdd/connexion.php");

$reponse = "<table border='1'>
                <tr>
                    <th id='th_categorie'>CATEGORIE</th>
                    <th id='th_emballage'>EMBALLAGES</th>
                    <th id='th_unite' colspan='2'>UNITES</th>
                    <th id='th_action'>ACTIONS POUR EMBALLAGES</th>
                </tr>";

// SELECTION DE CATEGORIE
$slct_categorie = $connexion -> prepare("SELECT * FROM categorie ORDER BY id ASC");
$slct_categorie -> execute();
$tab_slct_categorie = $slct_categorie -> fetchAll();
$nb_tab = count($tab_slct_categorie);

for($i = 0; $i < $nb_tab; $i++){
    $id_categorie = $tab_slct_categorie[$i]["id"];
    $categorie = $tab_slct_categorie[$i]["nom_categorie"];

    // SELECTION D'emballage DANS LA categorie
    $slct_emballage = $connexion -> prepare("SELECT * FROM emballage WHERE id_categorie = :id_categorie ORDER BY id ASC");
    $slct_emballage -> execute([
        "id_categorie" => $id_categorie
    ]);
    $tab_slct_emballage = $slct_emballage -> fetchAll();
    $nb_tab_emballage = count($tab_slct_emballage); // NOMBRE D'emballages DANS categorie

    // COMPTER LE NOMBRE D'unite DANS L'emballage
    $total_unite_par_categorie = 0;
    for($i_unite_pour_categorie = 0; $i_unite_pour_categorie < $nb_tab_emballage; $i_unite_pour_categorie++){
        $id_emballage_pour_rowspan = $tab_slct_emballage[$i_unite_pour_categorie]["id"];

        // SELECTION DE L'unite DANS L'emballage
        $slct_unite_pour_rowspan = $connexion -> prepare("SELECT nom_unite FROM unite WHERE id_emballage = :id_emballage");
        $slct_unite_pour_rowspan -> execute([
            "id_emballage" => $id_emballage_pour_rowspan
        ]);
        $tab_unite_pour_rowspan = $slct_unite_pour_rowspan -> fetchAll();
        $nb_unite_pour_rowspan = count($tab_unite_pour_rowspan);

        if($nb_unite_pour_rowspan == 0){
            $total_unite_par_categorie += 1;
        }else{
            $total_unite_par_categorie = $total_unite_par_categorie + $nb_unite_pour_rowspan;
        }
    }

    if($nb_tab_emballage > 0){
        $id_emballage = $tab_slct_emballage[0]["id"];   //PREMIER EMBALLAGE
        $nom_emballage = $tab_slct_emballage[0]["nom_emballage"];
    
        // SELECTION DE L'unite DANS L'emballage
        $slct_unite = $connexion -> prepare("SELECT id, nom_unite FROM unite WHERE id_emballage = :id_emballage");
        $slct_unite -> execute([
            "id_emballage" => $id_emballage
        ]);
        $tab_unite = $slct_unite -> fetchAll();
        $nb_unite = count($tab_unite);

        $rowspan_pour_emballage = $nb_unite;
        if($nb_unite == 0){
            $rowspan_pour_emballage = 1;
        }

        if($nb_unite > 0){
            $premier_id_unite = $tab_unite[0]['id'];
            $premier_nom_unite = $tab_unite[0]['nom_unite'];
        }else{
            $premier_id_unite = 0;
            $premier_nom_unite = "";
        }
        

        $reponse .= "<tr id='tr_categorie'>
                    <td id='td_nom' class='espace_gauche td_categorie' rowspan='{$total_unite_par_categorie}'>{$categorie}</td>
                    <td id='td_rang' class='espace_gauche' rowspan='{$rowspan_pour_emballage}'>{$nom_emballage}</td>
                    <td id='td_nom' class='espace_gauche'>{$premier_nom_unite}</td>
                    <td id='td_nom' class='td_btn_unite'>
                        <button id='modifier_unite' data-idunite='{$premier_id_unite}' data-nomunite='{$premier_nom_unite}'>MODIFIER</button>
                        <button id='supprimer_unite' data-idunite='{$premier_id_unite}' data-nomunite='{$premier_nom_unite}'>SUPPRIMER</button>
                    </td>
                    <td id='td_actions' rowspan='{$rowspan_pour_emballage}'>
                        <button id='ajouter_unite' data-idcategorie='{$id_categorie}' data-idemballage='{$id_emballage}' data-emballage='{$nom_emballage}'>Ajouter une unité</button>
                        <button id='modifier' data-id='{$id_emballage}'>MODIFIER</button>
                        <button id='supprimer' data-id='{$id_emballage}' data-emballage='{$nom_emballage}'>SUPPRIMER</button>
                    </td>
                </tr>";

                // unite POUR CHAQUE emballage
                for($i_unite = 1; $i_unite < $nb_unite; $i_unite++){
                    $id_unite = $tab_unite[$i_unite]["id"];
                    $nom_unite = $tab_unite[$i_unite]["nom_unite"];
                    $reponse .= "<tr>
                                    <td class='espace_gauche'>{$nom_unite}</td>
                                    <td id='td_nom' class='td_btn_unite'>
                                        <button id='modifier_unite' data-idunite='{$id_unite}' data-nomunite='{$nom_unite}'>MODIFIER</button>
                                        <button id='supprimer_unite' data-idunite='{$id_unite}' data-nomunite='{$nom_unite}'>SUPPRIMER</button>
                                    </td>
                                </tr>";
                }

        // A PARTIR DE DEUXIEME LIGNE DE L'emballage
        for($i_emballage = 1; $i_emballage < $nb_tab_emballage; $i_emballage++){
            $id_emballage_2 = $tab_slct_emballage[$i_emballage]["id"];
            $nom_emballage_2 = $tab_slct_emballage[$i_emballage]["nom_emballage"];

             // SELECTION DE L'unite DANS L'emballage
            $slct_unite_2 = $connexion -> prepare("SELECT id, nom_unite FROM unite WHERE id_emballage = :id_emballage");
            $slct_unite_2 -> execute([
                "id_emballage" => $id_emballage_2
            ]);
            $tab_unite_2 = $slct_unite_2 -> fetchAll();
            $nb_unite_2 = count($tab_unite_2);

            $rowspan_pour_emballage_2 = $nb_unite_2;
            if($nb_unite_2 == 0){
                $rowspan_pour_emballage_2 = 1;
            }

            if($nb_unite_2 > 0){
                $second_id_unite = $tab_unite_2[0]['id'];
                $second_nom_unite = $tab_unite_2[0]['nom_unite'];
            }

            $reponse .= "<tr>
                        <td id='td_rang' class='espace_gauche' rowspan='{$rowspan_pour_emballage_2}'>{$nom_emballage_2}</td>
                        <td id='td_nom' class='espace_gauche'>{$second_nom_unite}</td>
                        <td id='td_nom' class='td_btn_unite'>
                            <button id='modifier_unite' data-idunite='{$second_id_unite}' data-nomunite='{$second_nom_unite}'>MODIFIER</button>
                            <button id='supprimer_unite' data-idunite='{$second_id_unite}' data-nomunite='{$second_nom_unite}'>SUPPRIMER</button>
                        </td>
                        <td id='td_actions' rowspan='{$rowspan_pour_emballage_2}'>
                            <button id='ajouter_unite' data-idcategorie='{$id_categorie}' data-idemballage='{$id_emballage_2}' data-emballage='{$nom_emballage_2}'>Ajouter une unité</button>
                            <button id='modifier' data-id='{$id_emballage_2}'>MODIFIER</button>
                            <button id='supprimer' data-id='{$id_emballage_2}' data-emballage='{$nom_emballage_2}'>SUPPRIMER</button>
                        </td>
                    </tr>";

                    // unite POUR CHAQUE emballage
                    for($i_unite_2 = 1; $i_unite_2 < $nb_unite_2; $i_unite_2++){
                        $id_unite_2 = $tab_unite_2[$i_unite_2]["id"];
                        $nom_unite_2 = $tab_unite_2[$i_unite_2]["nom_unite"];
                        $reponse .= "<tr>
                                        <td class='espace_gauche'>{$nom_unite_2}</td>
                                        <td id='td_nom' class='td_btn_unite'>
                                            <button id='modifier_unite' data-idunite='{$id_unite_2}' data-nomunite='$nom_unite_2'>MODIFIER</button>
                                            <button id='supprimer_unite' data-idunite='{$id_unite_2}' data-nomunite='$nom_unite_2'>SUPPRIMER</button>
                                        </td>
                                    </tr>";
                    }
        }
    }
}

$reponse .= "</table>";

echo $reponse;