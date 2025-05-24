<?php
//$point_de_vente = $_POST["point_vente"];
$id = $_POST["id"];
$prenom = $_POST["nouv_prenom"];
$nom = $_POST["nouv_nom"];
$jour_naissance = $_POST["nouv_jour_naissance"];
$mois_naissance = $_POST["nouv_mois_naissance"];
$annee_naissance = $_POST["nouv_annee_naissance"];
$cin = $_POST["nouv_cin"];
$adresse = $_POST["nouv_adresse"];
$num_phone = $_POST["nouv_num_phone"];


include("../../bdd/connexion.php");

$modification = $connexion -> prepare("UPDATE admin_par_point_vente SET 
prenom = :nouv_prenom1,
nom = :nouv_nom1,
jour_naissance = :nouv_jour_naissance1,
mois_naissance = :nouv_mois_naissance1,
annee_naissance = :nouv_annee_naissance1,
nume_cin = :nouv_cin1,
adresse = :nouv_adresse1,
nume_phone = :nouv_num_phone1
WHERE id = :id");
$resultat = $modification -> execute([
    "nouv_prenom1" => $prenom,
    "nouv_nom1" => $nom,
    "nouv_jour_naissance1" => $jour_naissance,
    "nouv_mois_naissance1" => $mois_naissance,
    "nouv_annee_naissance1" => $annee_naissance,
    "nouv_cin1" => $cin,
    "nouv_adresse1" => $adresse,
    "nouv_num_phone1" => $num_phone,
    "id" => $id
]);
echo $resultat;