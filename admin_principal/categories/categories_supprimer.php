<?php
$id = $_POST["id"];

include("../../bdd/connexion.php");

$suppression = $connexion -> prepare("DELETE FROM categorie WHERE id = :id");
$resultat = $suppression -> execute([
    "id" => $id
]);

echo $resultat;