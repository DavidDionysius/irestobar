<?php
$point_de_vente = $_POST["point_vente"];
$id = $_POST["id_point_vente"];

include("../../bdd/connexion.php");

$modification = $connexion -> prepare("UPDATE points_de_vente SET nom_point_de_vente = :point_venvte WHERE id = :id");
$resultat = $modification -> execute([
    "point_venvte" => $point_de_vente,
    "id" => $id
]);
echo $resultat;