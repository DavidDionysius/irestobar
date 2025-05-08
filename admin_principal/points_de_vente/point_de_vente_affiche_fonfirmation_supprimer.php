<?php
$id = $_POST["id_point_vente"];
$nom_point_de_vente = $_POST["nom_point_vente"];

$aff = "<div class='cont_question'>
            <h2>Voulez-vous vraiment supprimer <span id='nom_point_vente'>{$nom_point_de_vente}</span> ?</h2>
            <div class='cont_boutons'>
                <button id='accepter' data-id='{$id}'>OUI</button>
                <button id='refuser'>NON</button>
            </div>
        </div>";
echo $aff;