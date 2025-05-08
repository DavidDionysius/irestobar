<?php
$id = $_POST["id"];

include("../../bdd/connexion.php");

$suppression = $connexion -> prepare("DELETE FROM points_de_vente WHERE id = :id");
$resultat = $suppression -> execute([
    "id" => $id
]);

echo $resultat;