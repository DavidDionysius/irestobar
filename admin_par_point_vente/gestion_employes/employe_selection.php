<?php
include("../../bdd/connexion.php");

$id = $_POST["id"];

$slct = $connexion -> prepare("SELECT * FROM admin_par_point_vente WHERE id_point_de_vente = :id_point_vente");
$slct -> execute([
    "id_point_vente" => $id
]);
$tab_selection = $slct -> fetchAll();

$affiche = "<table border='1'>
                <tr>
                    <th id='thNom'>PRENOM et NOM</th>
                    <th id='thDtns'>DATE DE NAISSANCE</th>
                    <th id='thCin'>CIN</th>
                    <th id='thAdresse'>ADRESSE</th>
                    <th id='thContact'>CONTACT</th>
                    <th id='thActions'>ACTIONS</th>
                </tr>";

for($i = 0; $i <count($tab_selection); $i++){
    $id = $tab_selection[$i]["id"];
    $prenom = $tab_selection[$i]["prenom"];
    $nom = $tab_selection[$i]["nom"];
    $jour_naissance = $tab_selection[$i]["jour_naissance"];
    $mois_naissance = $tab_selection[$i]["mois_naissance"];
    $annee_naissance = $tab_selection[$i]["annee_naissance"];
    $nume_cin = $tab_selection[$i]["nume_cin"];
    $adresse = $tab_selection[$i]["adresse"];
    $nume_phone = $tab_selection[$i]["nume_phone"];

    $affiche .= "
        <tr>
            <td>{$prenom} {$nom}</td>
            <td>{$jour_naissance} {$mois_naissance} {$annee_naissance}</td>
            <td>{$nume_cin}</td>
            <td>{$adresse}</td>
            <td>{$nume_phone}</td>
            <td id='tdActions'>
                <button id='modifier' data-id='{$id}'>MODIFIER</button>
                <button id='supprimer' data-id='{$id}' data-adminpointvente='{$prenom}'>SUPPRIMER</button>
            </td>
        </tr>
    ";
}

$affiche .= "</table>";

echo $affiche;