<?php
$id = $_POST["id_article"];
$nom_article = $_POST["nom_article"];

$aff = "<div class='cont_question'>
            <h2>Voulez-vous vraiment supprimer l'article <span id='nom_article_supprimer'>{$nom_article}</span> ?</h2>
            <div class='cont_boutons'>
                <button id='accepter' data-id='{$id}'>OUI</button>
                <button id='refuser'>NON</button>
            </div>
        </div>";
echo $aff;