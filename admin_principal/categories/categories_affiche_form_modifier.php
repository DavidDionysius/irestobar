<?php
include("../../bdd/connexion.php");
$id = $_POST["id_categorie"];

// Selection du nom de categorie
$slct_categorie = $connexion -> prepare("SELECT nom_categorie FROM categorie WHERE id = :id");
$slct_categorie -> execute([
    "id" => $id
]);
$tab_categorie = $slct_categorie -> fetchAll();
$nom_categorie = $tab_categorie[0]["nom_categorie"];

$affiche = "<div id='formulaire_modifier'>
                <button id='fermer_modification'>X</button>
                <div>
                    <label for=''>Nom de la categorie : </label>
                    <input type='text' id='categorie_modifier' value='{$nom_categorie}' />
                </div>

                <div>
                    <button id='bouton_modifier' data-id='{$id}'>ENREGISTRER</button>
                </div>
            </div>";
echo $affiche;