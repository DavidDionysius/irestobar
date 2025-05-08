<?php
include("../../bdd/connexion.php");

$id_admin_point_vente = $_POST["id"];
$slct_admin = $connexion -> prepare("SELECT * FROM admin_par_point_vente WHERE id = :id_admin_point_vente");
$slct_admin -> execute([
    "id_admin_point_vente" => $id_admin_point_vente
]);
// DEBUT KETRIKA SEUL
$tab_admin_point_vente = $slct_admin -> fetchAll();
$prenom_admin_point_vente = $tab_admin_point_vente[0]["prenom"];
$nom_admin_point_vente = $tab_admin_point_vente[0]["nom"];
$jour_naissance_admin_point_vente = $tab_admin_point_vente[0]["jour_naissance"];
$mois_naissance_admin_point_vente = $tab_admin_point_vente[0]["mois_naissance"];
$annee_naissance_admin_point_vente = $tab_admin_point_vente[0]["annee_naissance"];
$num_cin_admin_point_vente = $tab_admin_point_vente[0]["nume_cin"];
$adresse_admin_point_vente = $tab_admin_point_vente[0]["adresse"];
$nume_phone_admin_point_vente = $tab_admin_point_vente[0]["nume_phone"];



$affiche = "<div id='formulaire_modification'>
            <button id='fermer'>X</button>
            <div>
                <label for=''>Prénom : </label>
                <input type='text' id='prenom_modifier' value='{$prenom_admin_point_vente}'autofocus />
            </div>

            <div>
                <label for=''>Nom : </label>
                <input type='text' id='nom_modifier' value='{$nom_admin_point_vente}' />
            </div>

            <div>
                <label for=''>Date de naissance : </label>
                <select id='jour_naissance_modifier'>";
                    for($i_jour = 1; $i_jour <= 31; $i_jour++){
                        // KETRIKA SEUL
                        $selected = ($i_jour == $jour_naissance_admin_point_vente)?'selected' : '' ;

                        $affiche .= "<option value='{$i_jour}' {$selected}>{$i_jour}</option>";
                    }
                $affiche .= "</select> / 
                <select id='mois_naissance_modifier'>";
                    $mois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
                    for ($i_mois = 0; $i_mois < count($mois); $i_mois++) {
                        $mois_courant = $mois[$i_mois];
                        $selected = ($mois_courant == $mois_naissance_admin_point_vente) ? 'selected' : '';
                        $affiche .= "<option value='{$mois_courant}' {$selected}>{$mois_courant}</option>";
                    }
                $affiche .= "</select> / 
                <input type='number' id='annee_naissance_modifier' value = '{$annee_naissance_admin_point_vente}'/>
            </div>

            <div>
                <label for=''>Numéro CIN : </label>
                <input type='text' id='cin_modifier' value = '{$num_cin_admin_point_vente}'/>
            </div>

            <div>
                <label for=''>Adresse : </label>
                <input type='text' id='adresse_modifier' value = '{$adresse_admin_point_vente}'/>
            </div>

            <div>
                <label for=''>Numéro téléphone : </label>
                <input type='text' id='nume_phone_modifier' value = '{$nume_phone_admin_point_vente}' />
            </div>

            <div>
                <button id='bouton' data-id = '{$id_admin_point_vente}' >ENREGISTRER</button>
            </div>
        </div>";

echo $affiche;