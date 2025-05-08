<?php
include("../../bdd/connexion.php");
$emballage = $_POST["nom_emballage"];
$id_categorie = $_POST["id_categorie"];

if($emballage == ""){
    echo "Veuillez remplir le champ";
}else{
    // Verifier s'il y a de doublon
    $slct_doublon = $connexion -> prepare("SELECT nom_emballage FROM emballage WHERE id_categorie = :id_categorie AND nom_emballage = :nom_emballage");
    $slct_doublon -> execute([
        "nom_emballage" => $emballage,
        "id_categorie" => $id_categorie
    ]);
    $tableau_slct_doublon = $slct_doublon -> fetchAll();
    if(count($tableau_slct_doublon) > 0){
        echo "Cette donnée est déjà enregistrée";
    }else{
        $insert = $connexion -> prepare("INSERT INTO emballage(id_categorie, nom_emballage) VALUES(:categorie, :nom_emballage)");
        $reponse = $insert -> execute([
            "categorie" => $id_categorie,
            "nom_emballage" => $emballage
        ]);
        echo $reponse;  // Retourne 1 si la donnée est enregistrée
    }
}
