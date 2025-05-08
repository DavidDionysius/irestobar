<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEMBRES</title>
    <script src="./../../js/jquery-3.6.0.min.js"></script>
    <?php include("gestion_admin_par_point_vente_style.php"); ?>
</head>
<body>
    <nav>
        <h1>LOGO</h1>
        <ul>
            <li><a href="../points_de_vente/point_de_vente.php">Points de vente</a></li>
            <li><a href="" id="actif">Administrateurs par point de vente</a></li>
            <li><a href="./../categories/categories.php">Categories</a></li>
            <li><a href="./../emballages/emballage.php">Emballage</a></li>
            <li><a href="../articles/articles.php">Articles</a></li>
            <li><a href="">Stock</a></li>
            <li><a href="./../../deconnexion/deconnexion.php">Se deconnecter</a></li>
        </ul>
    </nav>

    <div class="conteneur">
        <div class="conteneur_point_vente">
            <ul>
                <?php
                include("../../bdd/connexion.php");

                // SELECTION DE L'id_point_vente DANS L'URL
                if(isset($_GET["point_vente"])){
                    $id_point_vente_dans_url = $_GET["point_vente"];
                }else{
                    // SELECTION DE L'id DU PREMIER point_vente
                    $slct_premier_id = $connexion -> prepare("SELECT * FROM points_de_vente ORDER BY id ASC");
                    $slct_premier_id -> execute();
                    $tab_slct_premier_id = $slct_premier_id -> fetchAll();
                    if(count($tab_slct_premier_id) > 0){
                        $id_point_vente_dans_url = $tab_slct_premier_id[0]["id"];
                    }
                }
                
                // SELECTION point_vente DANS LA BDD / MANAO SELECTION PAR DEFAUT NY 1ER ENREGISTREMENT
                $slct = $connexion -> prepare("SELECT * FROM points_de_vente ORDER BY id ASC");
                $slct -> execute();
                $tab_slct = $slct -> fetchAll();
                $nb_tab = count($tab_slct);

                for($i = 0; $i < $nb_tab; $i++){
                    $id = $tab_slct[$i]["id"];
                    $point_de_vente = $tab_slct[$i]["nom_point_de_vente"];
                    if($id == $id_point_vente_dans_url){
                        ?>
                        <input type="number" id="id_point_vente_url" value="<?php echo $id; ?>" hidden>
                        <li><a href="?point_vente=<?php echo $id; ?>" id="point_vente_actif"><?php echo $point_de_vente; ?></a></li>
                        <?php
                    }else{
                        ?>
                        <li><a href="?point_vente=<?php echo $id; ?>" id="point_vente_non_actif"><?php echo $point_de_vente; ?></a></li>
                        <?php
                    }
                    
                }
                ?> 
            </ul>
        </div>

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
    include("gestion_admin_par_point_vente_js.php")
    ?>
</body>
</html>