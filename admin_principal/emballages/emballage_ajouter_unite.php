<?php
$nouvelle_unite = $_POST["nouvelle_unite"];
$id_categorie = $_POST["id_categorie"];
$id_emballage = $_POST["id_emballage"];

include("../../bdd/connexion.php");

// SELECTION DE L'unite DE L'emballage SELECTIONNE
$slct_unite_emballage = $connexion -> prepare("SELECT nom_unite FROM unite WHERE id_emballage = :id_emballage AND nom_unite = :unite");
$slct_unite_emballage -> execute([
    "id_emballage" => $id_emballage,
    "unite" => $nouvelle_unite
]);
$tab_unite = $slct_unite_emballage -> fetchAll();
$nb_doublon = count($tab_unite);

if($nb_doublon > 0){
    $resultat = "L'unité $nouvelle_unite est déjà enregistrée!!!!";
}else{
    $insertion = $connexion -> prepare("INSERT INTO unite(id_categorie, id_emballage, nom_unite) VALUES(:cat, :embal, :unite)");
    $resultat = $insertion -> execute([
        "cat" => $id_categorie,
        "embal" => $id_emballage,
        "unite" => $nouvelle_unite
    ]);
}

echo $resultat;