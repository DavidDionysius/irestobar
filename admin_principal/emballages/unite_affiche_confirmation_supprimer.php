<?php
$id_unite = $_POST["id_unite"];
$nom_unite = $_POST["nom_unite"];

$aff = "<div class='cont_question'>
            <h2>Voulez-vous vraiment supprimer l'unité <span id='nom_unite'>{$nom_unite}</span> ?</h2>
            <div class='cont_boutons'>
                <button id='accepter_suppression_unite' data-idunite='{$id_unite}'>OUI</button>
                <button id='refuser_suppression_unite'>NON</button>
            </div>
        </div>";
echo $aff;