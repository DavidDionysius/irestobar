<?php
$id = $_POST["id"];

include("../../bdd/connexion.php");

$suppression = $connexion -> prepare("DELETE FROM admin_par_point_vente WHERE id = :id");
$resultat = $suppression -> execute([
    "id" => $id
]);

echo $resultat;