<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEMBRES</title>
    <script src="./../../js/jquery-3.6.0.min.js"></script>
    <?php include("articles_style.php"); ?>
</head>
<body>
    <nav>
        <h1>LOGO</h1>
        <ul>
            <li><a href="../points_de_vente/point_de_vente.php">Points de vente</a></li>
            <li><a href="../gestion_admin_par_point_vente/gestion_admin_par_point_vente.php">Administrateurs par point de vente</a></li>
            <li><a href="./../categories/categories.php">Categories</a></li>
            <li><a href="./../emballages/emballage.php">Emballage</a></li>
            <li><a href="" id="actif">Articles</a></li>
            <li><a href="">Stock</a></li>
            <li><a href="./../../deconnexion/deconnexion.php">Se deconnecter</a></li>
        </ul>
    </nav>

    <div class="conteneur">
        <div id="formulaire">
            <div>
                <label for="" id='indice'>Nom de l'article : </label>
                <input type="text" id="nom_article" autofocus />
            </div>

            <div>
                <label for="" id='indice'>Catégorie : </label>
                <select id="categorie">
                    <option value=""></option>
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

            <div id="cont_emballage">
                <label for="" id='indice'>Emballages : </label>
                <div id="liste_emballage"></div>
            </div>

            <div>
                <button id="bouton">ENREGISTRER</button>
            </div>
        </div>
    </div>

    <div class="selection"></div>
    
    <!-- SUPPRESSION -->
    <div class="cont_supprimer"></div>

    <!-- MODIFICATION (05-05-2025) -->
    <div class="cont_modifier"></div>
    <?php
    include("articles_js.php")
    ?>
</body>
</html>