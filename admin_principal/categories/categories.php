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
    <?php include("categories_style.php") ?>
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
            <li><a href="" id="actif">Categories</a></li>
            <li><a href="./../emballages/emballage.php">Emballages</a></li>
            <li><a href="./../articles/articles.php">Articles</a></li>
            <li><a href="">Stock</a></li>
            <li><a href="./../../deconnexion/deconnexion.php">Se deconnecter</a></li>
        </ul>
    </nav>

    <div id="formulaire">
        <div>
            <label for="">Categorie du produit : </label>
            <input type="text" id="categorie" />
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

    <?php
    include("categories_js.php");
    ?>
</body>
</html>