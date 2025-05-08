<?php
include("../../bdd/connexion.php");

$id_emballage = $_POST["id_emballage"];

// SELECTION DE L'unite DANS L'emballage
$slct_unite = $connexion -> prepare("SELECT id, nom_unite FROM unite WHERE id_emballage = :id_emballage");
$slct_unite -> execute([
    "id_emballage" => $id_emballage
]);

$tab_unite = $slct_unite -> fetchAll();
$nb_unite = count($tab_unite);

$reponse = "";
for($i_unite = 0; $i_unite < $nb_unite; $i_unite++){
    $id_unite = $tab_unite[$i_unite]["id"];
    $nom_unite = $tab_unite[$i_unite]["nom_unite"];
    $reponse .= "<div id='cont_chaque_unite'>
                    <label id='label_unite'>{$nom_unite} : </label> <input type='number' data-idunite='{$id_unite}' class='champ_unite unite_{$id_emballage}'>
                </div>";
}

echo $reponse;