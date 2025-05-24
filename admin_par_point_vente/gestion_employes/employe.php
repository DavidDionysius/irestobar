<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEMBRES</title>
    <script src="./../../js/jquery-3.6.0.min.js"></script>
    <?php include("employe_style.php"); ?>
</head>
<body>
    <?php
    $prenom = $_SESSION["prenom"];

    include("../../bdd/connexion.php");
    // SELECTION point_de_vente
    $slct_point_de_vente = $connexion -> prepare("SELECT id_point_de_vente, nom_point_de_vente FROM admin_par_point_vente a INNER JOIN points_de_vente p ON a.id_point_de_vente = p.id WHERE a.prenom = :prenom");
    $slct_point_de_vente -> execute([
        "prenom" => $prenom
    ]);
    $tab_slct_point_vente = $slct_point_de_vente -> fetchAll();
    $id_point_de_vente = $tab_slct_point_vente[0]["id_point_de_vente"];
    $point_vente = $tab_slct_point_vente[0]["nom_point_de_vente"];

    ?>
    <nav>
        <h1><?= $prenom . " (" . $point_vente . ")"; ?></h1>
        <ul>
            <li><a href="" id="actif">Gestion d'employés</a></li>
            <li><a href="./../categories/categories.php">Categories</a></li>
            <li><a href="./../emballages/emballage.php">Emballage</a></li>
            <li><a href="../articles/articles.php">Articles</a></li>
            <li><a href="">Stock</a></li>
            <li><a href="./../../deconnexion/deconnexion.php">Se deconnecter</a></li>
        </ul>
    </nav>

    <div class="conteneur">
        <!-- FORMULAIRE D'ENREGISTREMENT -->
        <div id="formulaire">
            <div>
                <label for="">Prénom : </label>
                <input type="text" id="prenom" autofocus />
            </div>

            <div>
                <label for="">Nom : </label>
                <input type="text" id="nom" />
            </div>

            <div>
                <label for="">Date de naissance : </label>
                <select id="jour_naissance">
                    <?php
                    for($i_jour = 1; $i_jour <= 31; $i_jour++){
                        ?><option><?php echo $i_jour ?></option><?php
                    }
                    ?>
                </select> / 
                <select id="mois_naissance">
                    <?php
                    $mois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
                    for($i_mois = 0; $i_mois < count($mois); $i_mois++){
                        ?><option value="<?php echo $mois[$i_mois]; ?>"><?php echo $mois[$i_mois]; ?></option><?php
                    }
                    ?>
                </select> / 
                <input type="number" id="annee_naissance" />
            </div>

            <div>
                <label for="">Numéro CIN : </label>
                <input type="text" id="cin" />
            </div>

            <div>
                <label for="">Adresse : </label>
                <input type="text" id="adresse" />
            </div>

            <div>
                <label for="">Numéro téléphone : </label>
                <input type="text" id="nume_phone" />
            </div>

            <div>
                <label for="">Mot de passe : </label>
                <input type="text" id="mot_passe" />
            </div>

            <div>
                <label for="">Confirmation du mot de passe : </label>
                <input type="text" id="confirm_mot_passe" />
            </div>

            <div>
                <button id="bouton">ENREGISTRER</button>
            </div>
        </div>
    </div>

    <div class="selection"></div>

    <!-- MODIFICATION (14-04-2025) -->
     <div class="conteneur_modification"></div>
      <!-- SUPPRESSION -->
    <div class="cont_supprimer"></div>
    <?php
    include("employe_js.php")
    ?>
</body>
</html>