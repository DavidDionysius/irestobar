<?php
include("../../bdd/connexion.php");

$slct = $connexion -> prepare("SELECT * FROM points_de_vente ORDER BY id ASC");
$slct -> execute();
$tab_slct = $slct -> fetchAll();
$nb_tab = count($tab_slct);
$reponse = "<table border='1'>
                <tr>
                    <th id='th_rang'>RANG</th>
                    <th id='th_nom'>NOM DU POINT DE VENTE</th>
                    <th id='th_action'>ACTIONS</th>
                </tr>";

for($i = 0; $i < $nb_tab; $i++){
    $rang = $i + 1;
    $id = $tab_slct[$i]["id"];
    $point_de_vente = $tab_slct[$i]["nom_point_de_vente"];
    $reponse .= "<tr>
                    <td id='td_rang'>{$rang}</td>
                    <td id='td_nom'>{$point_de_vente}</td>
                    <td id='td_actions'>
                        <button id='modifier' data-id='{$id}'>MODIFIER</button>
                        <button id='supprimer' data-id='{$id}' data-pointvente='{$point_de_vente}'>SUPPRIMER</button>
                    </td>
                </tr>";
}

$reponse .= "</table>";

echo $reponse;