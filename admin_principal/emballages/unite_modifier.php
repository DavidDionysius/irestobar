<?php
$id_unite = $_POST["id_unite"];
$nouvelle_unite = $_POST["nouvelle_unite"]; // Valeur de la nouvelle unité

include("../../bdd/connexion.php");

$modification = $connexion -> prepare("UPDATE unite SET nom_unite = :unite WHERE id = :id");
$resultat = $modification -> execute([
    "unite" => $nouvelle_unite,
    "id" => $id_unite
]);
echo $resultat;