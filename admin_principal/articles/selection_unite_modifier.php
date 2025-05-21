<?php
include("../../bdd/connexion.php");

$id_emballage = $_POST["id_emballage"];
$id_article = $_POST["id_article"];

// SELECTION DE L'unite DANS L'emballage
$slct_unite = $connexion -> prepare("SELECT id, nom_unite FROM unite WHERE id_emballage = :id_emballage");
$slct_unite -> execute([
    "id_emballage" => $id_emballage
]);

$tab_unite = $slct_unite -> fetchAll();
$nb_unite = count($tab_unite);

$reponse = "";

// VERIFIER SI le $id_emballage EXISTE DANS LA TABLE unites
// SELECTION DANS TABLE articles
$slct_articles = $connexion -> prepare("SELECT id_emballage, quantite_unites FROM articles WHERE id = :id_article");
$slct_articles -> execute([
    "id_article" => $id_article
]);
$tab_articles = $slct_articles -> fetch();

$chaine_id_emballage = $tab_articles["id_emballage"];
$tab_id_emballage = explode(",", $chaine_id_emballage);     // TRANSFORMER EN TABLEAU LA COLONNE id_emballage SELECTIONNE DANS LA TABLE article
$index_id_emballage = array_search($id_emballage, $tab_id_emballage);   // PRENDRE LA POSITION DE L'id_emballage DANS LE TABLEAU CREE

$chaine_qte_unite = $tab_articles["quantite_unites"];
$tab_qte_unite = explode(",", $chaine_id_emballage);    // TRANSFORMER EN array LA COLONNE quantite_unites DANS LA TABLE articles
$qte_unite_emballage = $tab_qte_unite[$index_id_emballage]; // PRENDRE LA VALEUR DE id_unite:qte_unite SELON LA POSITION DE L'id_emballage

for($i_unite = 0; $i_unite < $nb_unite; $i_unite++){
    $id_unite = $tab_unite[$i_unite]["id"];
    $nom_unite = $tab_unite[$i_unite]["nom_unite"];
    
    $reponse .= "<div id='cont_chaque_unite'>
                    <label id='label_unite'>{$nom_unite} : </label>
                    <input type='number' value='{$index_id_emballage}' data-idunite='{$id_unite}' class='champ_unite_modifier unite_modifier_{$id_emballage}' />
                </div>";
}

echo $reponse;