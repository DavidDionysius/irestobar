<?php
include("../../bdd/connexion.php");

$id_unite = $_POST["id_unite"];

// SUPPRESSION DE L'UNITE
$suppression = $connexion -> prepare("DELETE FROM  unite WHERE id = :id_unite");
$resultat = $suppression -> execute([
    "id_unite" => $id_unite
]);
echo $resultat;