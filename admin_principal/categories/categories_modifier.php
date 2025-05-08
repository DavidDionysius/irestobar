<?php
$categorie = $_POST["nouv_categorie"];
$id = $_POST["id_categorie"];

include("../../bdd/connexion.php");

$modification = $connexion -> prepare("UPDATE categorie SET nom_categorie = :categorie WHERE id = :id");
$resultat = $modification -> execute([
    "categorie" => $categorie,
    "id" => $id
]);
echo $resultat;