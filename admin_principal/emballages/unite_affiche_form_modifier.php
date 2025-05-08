<?php
include("../../bdd/connexion.php");
$id_unite = $_POST["id_unite"];
$nom_unite = $_POST["nom_unite"];

$affiche = "<div id='formulaire_modifier'>
                <button id='fermer_modification_unite'>X</button>
                <div>
                    <label for=''>Unité à modifier : </label>
                    <input type='text' class='nouvelle_unite' value='{$nom_unite}' />
                </div>

                <div>
                    <button id='bouton_modifier_unite' data-idunite='{$id_unite}'>ENREGISTRER</button>
                </div>
            </div>";
echo $affiche;