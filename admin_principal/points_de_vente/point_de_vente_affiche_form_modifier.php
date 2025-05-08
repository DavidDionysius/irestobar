<?php
include("../../bdd/connexion.php");
$id = $_POST["id_point_vente"];

// Selection du nom de point de vente
$slct_point_vente = $connexion -> prepare("SELECT nom_point_de_vente FROM points_de_vente WHERE id = :id");
$slct_point_vente -> execute([
    "id" => $id
]);
$tab_point_vente = $slct_point_vente -> fetchAll();
$nom_point_de_vente = $tab_point_vente[0]["nom_point_de_vente"];

$affiche = "<div id='formulaire_modifier'>
                <button id='fermer_modification'>X</button>
                <div>
                    <label for=''>Lieu du point de vente : </label>
                    <input type='text' id='point_vente_modifier' value='{$nom_point_de_vente}' />
                </div>

                <div>
                    <button id='bouton_modifier' data-id='{$id}'>ENREGISTRER</button>
                </div>
            </div>";
echo $affiche;