<?php
include("../../bdd/connexion.php");

$nom_article = $_POST["nom_article"];
$id_categorie = $_POST["id_categorie"];
$tab_emballage = $_POST["tab_emballage"];
$conteneur_qte_unite = $_POST["conteneur_qte_unite"];

$chaine_id_emballage = implode(",", $tab_emballage);

// VERIFIER SI L'article EXISTE DEJA
$slct_article = $connexion -> prepare("SELECT nom_article FROM articles WHERE nom_article = :article");
$slct_article -> execute([
    "article" => $nom_article
]);
$tab_article = $slct_article -> fetchAll();
if(count($tab_article) > 0){
    $resultat = "Cet article est déjà enregistré";
}else{
    $enregistrement = $connexion -> prepare("INSERT INTO articles(nom_article, id_categorie, id_emballage, quantite_unites) VALUES(:nom_article, :id_categorie, :id_emballage, :quantite_unites)");
    $resultat = $enregistrement -> execute([
        "nom_article" => $nom_article,
        "id_categorie" => $id_categorie,
        "id_emballage" => $chaine_id_emballage,
        "quantite_unites" => $conteneur_qte_unite
    ]);
}

echo $resultat;