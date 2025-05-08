<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMBALLAGE</title>
    <script src="./../../js/jquery-3.6.0.min.js"></script>
    <?php include("emballage_style.php") ?>
</head>
<body>
    <?php
    // $prenom = $_SESSION["prenom"];
    // if(!isset($prenom)){
    //     header("location:./../../index.php");
    // }
    ?>
    <nav>
        <!-- <h1><?php echo $prenom; ?></h1> -->
         <h1>PRENOM</h1>
        <ul>
            <li><a href="../points_de_vente/point_de_vente.php" >Points de vente</a></li>
            <li><a href="../gestion_admin_par_point_vente/gestion_admin_par_point_vente.php">Administrateurs par point de vente</a></li>
            <li><a href="./../categories/categories.php">Categories</a></li>
            <li><a href="" id="actif">Emballage</a></li>
            <li><a href="./../articles/articles.php">Articles</a></li>
            <li><a href="">Stock</a></li>
            <li><a href="./../../deconnexion/deconnexion.php">Se deconnecter</a></li>
        </ul>
    </nav>

    <div id="formulaire">
        <div>
            <label for="">Emballage : </label>
            <input type="text" id="emballage" />
        </div>
        <div>
            <label for="">Catégorie : </label>
            <select id="categorie">
                <?php
                include("../../bdd/connexion.php");

                $slct_categorie = $connexion -> prepare("SELECT * FROM categorie ORDER BY id ASC");
                $slct_categorie -> execute();
                $tab_slct_categorie = $slct_categorie -> fetchAll();
                $nb_tab = count($tab_slct_categorie);
                for($i = 0; $i < $nb_tab; $i++){
                    $id_categorie = $tab_slct_categorie[$i]["id"];
                    $categorie = $tab_slct_categorie[$i]["nom_categorie"];
                    ?>
                    <option value="<?php echo $id_categorie ?>"><?php echo $categorie ?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div>
            <button id="bouton">ENREGISTRER</button>
        </div>
    </div>

     <div class="selection"></div>
     
    <!-- MODIFICATION (11-04-2025) -->
    <div class="cont_modifier"></div>

    <!-- SUPPRESSION -->
    <div class="cont_supprimer"></div>

    <!-- AJOUT D'UNITE (22-04-2025) -->
    <div class="cont_ajout_unite"></div>

    <!-- SUPPRESSION UNITE (29-04-2025) -->
    <div class="cont_supprimer_unite"></div>
    
    <!-- MODIFICATION D'UNITE (11-04-2025) -->
    <div class="cont_modifier_unite"></div>

    <?php
    include("emballage_js.php");
    ?>
</body>
</html>