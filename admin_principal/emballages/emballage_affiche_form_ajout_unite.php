<?php
include("../../bdd/connexion.php");
$id_categorie = $_POST["id_categorie"];
$id_emballage = $_POST["id_emballage"];
$emballage = $_POST["emballage"];

$affiche = "<div id='formulaire_modifier_ajout_unite'>
                <button id='fermer_modification_ajout_unite'>X</button>
                <div>
                    <label for=''>Nouvelle unité pour l'emballage <span id='nom_emballage'>{$emballage}</span> : </label>
                    <input type='text' id='nouvelle_unite' />
                </div>

                <div>
                    <button id='bouton_ajouter_unite' data-idcategorie='{$id_categorie}' data-idemballage='{$id_emballage}'>ENREGISTRER</button>
                </div>
            </div>";
echo $affiche;