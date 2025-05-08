<?php
include("../../bdd/connexion.php");

$slct = $connexion -> prepare("SELECT * FROM categorie ORDER BY id ASC");
$slct -> execute();
$tab_slct = $slct -> fetchAll();
$nb_tab = count($tab_slct);
$reponse = "<table border='1'>
                <tr>
                    <th id='th_rang'>RANG</th>
                    <th id='th_nom'>NOM DE LA CATEGORIE</th>
                    <th id='th_action'>ACTIONS</th>
                </tr>";

for($i = 0; $i < $nb_tab; $i++){
    $rang = $i + 1;
    $id = $tab_slct[$i]["id"];
    $categorie = $tab_slct[$i]["nom_categorie"];
    $reponse .= "<tr>
                    <td id='td_rang'>{$rang}</td>
                    <td id='td_nom'>{$categorie}</td>
                    <td id='td_actions'>
                        <button id='modifier' data-id='{$id}'>MODIFIER</button>
                        <button id='supprimer' data-id='{$id}' data-categorie='{$categorie}'>SUPPRIMER</button>
                    </td>
                </tr>";
}

$reponse .= "</table>";

echo $reponse;