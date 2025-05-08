<?php
include("../../bdd/connexion.php");
$point_vente = $_POST["nom_point_vente"];

if($point_vente == ""){
    echo "Veuillez remplir le champ";
}else{
    // Verifier s'il y a de doublon
    $slct_doublon = $connexion -> prepare("SELECT nom_point_de_vente FROM points_de_vente WHERE nom_point_de_vente = :nom_point_de_vente");
    $slct_doublon -> execute([
        "nom_point_de_vente" => $point_vente
    ]);
    $tableau_selct_doublon = $slct_doublon -> fetchAll();
    if(count($tableau_selct_doublon) > 0){
        echo "Cette donnée est déjà enregistrée";
    }else{
        $insert = $connexion -> prepare("INSERT INTO points_de_vente(nom_point_de_vente) VALUES(:nom_point_de_vente)");
        $reponse = $insert -> execute([
            "nom_point_de_vente" => $point_vente
        ]);
        echo $reponse;  // Retourne 1 si la donnée est enregistrée
    }
}
