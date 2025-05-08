<?php
$id = $_POST["id"];

include("../../bdd/connexion.php");

$suppression = $connexion -> prepare("DELETE FROM emballage WHERE id = :id");
$resultat = $suppression -> execute([
    "id" => $id
]);

echo $resultat;