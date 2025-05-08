<?php
include("../../bdd/connexion.php");
$categorie = $_POST["nom_categorie"];

if($categorie == ""){
    echo "Veuillez remplir le champ";
}else{
    // Verifier s'il y a de doublon
    $slct_doublon = $connexion -> prepare("SELECT nom_categorie FROM categorie WHERE nom_categorie = :nom_categorie");
    $slct_doublon -> execute([
        "nom_categorie" => $categorie
    ]);
    $tableau_slct_doublon = $slct_doublon -> fetchAll();
    if(count($tableau_slct_doublon) > 0){
        echo "Cette donnée est déjà enregistrée";
    }else{
        $insert = $connexion -> prepare("INSERT INTO categorie(nom_categorie) VALUES(:nom_categorie)");
        $reponse = $insert -> execute([
            "nom_categorie" => $categorie
        ]);
        echo $reponse;  // Retourne 1 si la donnée est enregistrée
    }
}
