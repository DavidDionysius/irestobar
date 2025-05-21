<?php
$id = $_POST["id"];

include("../../bdd/connexion.php");

// SUPPRESSION DANS LA TABLE emballage
$suppression_emballage = $connexion -> prepare("DELETE FROM emballage WHERE id_categorie = :id");
$resultat = $suppression_emballage -> execute([
    "id" => $id
]);

// SUPPRESSION DANS LA TABLE unite
$suppression_unite = $connexion -> prepare("DELETE FROM unite WHERE id_categorie = :id");
$resultat = $suppression_unite -> execute([
    "id" => $id
]);

// SUPPRESSION DANS LA TABLE categorie
$suppression = $connexion -> prepare("DELETE FROM categorie WHERE id = :id");
$resultat = $suppression -> execute([
    "id" => $id
]);

echo $resultat;