<?php
include("../../bdd/connexion.php");

$id_point_vente_url = $_POST["id_point_vente_url"];
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$jour_naissance = $_POST["jour_naissance"];
$mois_naissance = $_POST["mois_naissance"];
$annee_naissance = $_POST["annee_naissance"];
$cin = $_POST["cin"];
$adresse = $_POST["adresse"];
$nume_phone = $_POST["nume_phone"];
$mot_passe = $_POST["mot_passe"];
$confirm_mot_passe = $_POST["confirm_mot_passe"];

if($annee_naissance > 0){
    if(strlen($annee_naissance) == 4){
        if($mot_passe == $confirm_mot_passe){
            $enregistrement = $connexion -> prepare("INSERT INTO `admin_par_point_vente`(`id_point_de_vente`, `prenom`, `nom`, `jour_naissance`, `mois_naissance`, `annee_naissance`, `nume_cin`, `adresse`, `nume_phone`, `mot_de_passe`) VALUES 
                                                                                    (:id_point_de_vente, :prenom, :nom, :jour_naissance, :mois_naissance, :annee_naissance, :nume_cin, :adresse, :nume_phone, :mot_de_passe)");
            $resultat = $enregistrement -> execute([
                "id_point_de_vente" => $id_point_vente_url,
                "prenom" => $prenom,
                "nom" => $nom,
                "jour_naissance" => $jour_naissance,
                "mois_naissance" => $mois_naissance,
                "annee_naissance" => $annee_naissance,
                "nume_cin" => $cin,
                "adresse" => $adresse,
                "nume_phone" => $nume_phone,
                "mot_de_passe" => $mot_passe
            ]);
            echo $resultat;
        }else{
            echo "Mot de passe incorrect";
        }
    }else{
        echo "L'année doit avoir 4 chiffres";
    }
}else{
    echo "L'année de naissance ne peut pas être négatif";
}