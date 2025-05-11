<?php
include("../../bdd/connexion.php");

$id_categorie = $_POST["id_categorie"];

// SELECTION D'emballage DANS LA categorie
$slct_emballage = $connexion -> prepare("SELECT * FROM emballage WHERE id_categorie = :id_categorie ORDER BY id ASC");
$slct_emballage -> execute([
    "id_categorie" => $id_categorie
]);

$tab_slct_emballage = $slct_emballage -> fetchAll();
$nb_tab_emballage = count($tab_slct_emballage);

$reponse = "<label id='label_sans_emballage'><input type='checkbox' value='0' class='sans_emballage'  /> Sans emballage</label>";
for($i_emballage = 0; $i_emballage < $nb_tab_emballage; $i_emballage++){
    $id_emballage = $tab_slct_emballage[$i_emballage]["id"];
    $nom_emballage = $tab_slct_emballage[$i_emballage]["nom_emballage"];
    $reponse .= "<label>
                    <input type='checkbox' value='{$id_emballage}' class='emballage' />
                    {$nom_emballage}
                </label>
                <section id='unite_par_emballage_{$id_emballage}' class='unite_par_emballage'></section>";
}

echo $reponse;