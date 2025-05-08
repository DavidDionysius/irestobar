<?php
$emballage = $_POST["point_vente"];
$id = $_POST["id_point_vente"];

include("../../bdd/connexion.php");

$modification = $connexion -> prepare("UPDATE emballage SET nom_emballage = :emballage WHERE id = :id");
$resultat = $modification -> execute([
    "emballage" => $emballage,
    "id" => $id
]);
echo $resultat;