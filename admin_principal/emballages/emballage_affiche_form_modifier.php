<?php
include("../../bdd/connexion.php");
$id = $_POST["id_emballage"];

// Selection du nom de point de vente
$slct_emballage = $connexion -> prepare("SELECT nom_emballage FROM emballage WHERE id = :id");
$slct_emballage -> execute([
    "id" => $id
]);
$tab_emballage = $slct_emballage -> fetchAll();
$nom_emballage = $tab_emballage[0]["nom_emballage"];

$affiche = "<div id='formulaire_modifier'>
                <button id='fermer_modification'>X</button>
                <div>
                    <label for=''>Lieu du point de vente : </label>
                    <input type='text' id='emballage_modifier' value='{$nom_emballage}' />
                </div>

                <div>
                    <button id='bouton_modifier' data-id='{$id}'>ENREGISTRER</button>
                </div>
            </div>";
echo $affiche;