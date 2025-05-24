<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: arial;
        }

        /* STYLYSATION DE FORMULAIRE */
        form{
            background-color: rgba(0, 0, 150, 0.3);
            width: 40%;
            height: 350px;
            margin: 100px auto;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            border-radius: 25px;
            box-shadow: 5px 15px 20px blue;
        }

        form h1{
            text-align: center;
            padding: 20px 0;
        }

        form div label{
            font-weight: bold;
            font-size: 18px;
            display: inline-block;
            width: 150px;
            text-align: right;
        }

        form div input{
            width: 250px;
            height: 30px;
            text-align: center;
            border-radius: 10px;
        }

        #bouton{
            font-size: 18px;
            border: none;
            padding: 10px 50px;
            border-radius: 10px;
            cursor: pointer;
        }

        #bouton:hover{
            background-color: rgba(0, 0, 150, 0.7);
            color: white;
        }

        #erreur{
            color: rgba(255, 0, 0, 1);
        }

        /* ANNIMATION */
        /* #login{
            animation: tourner 3s 4;
            color: white;
        }

        @keyframes tourner {
            0%{
                transform: rotateY('0deg');
            }

            100%{
                transform: rotateY('360deg');
            }
        } */
    </style>
    <script src="./js/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form method="post">
        <h1 id="login">LOGIN <br>IRESTOBAR</h1>
        <div>
            <label for="">PRENOM : </label>
            <input type="text" name="prenom">
        </div>

        <div>
            <label for="">MOT DE PASSE : </label>
            <input type="password" name="password">
        </div>

        <div>
            <button name="valider" id="bouton">Se connecter</button>
        </div>
        <div>
            <h4 id="erreur"></h4>
        </div>
    </form>

    <!-- CONNEXION -->
     <?php
     include("./bdd/connexion.php");
     if(isset($_POST["valider"])){
        $prenom = $_POST["prenom"];
        $mot_de_passe = $_POST["password"];

        if($prenom != "" && $mot_de_passe != ""){
            // ADMINISTRATEUR PRINCIPAL
            if($prenom == "irestobar"){
                if($mot_de_passe == "irestobar"){
                    $_SESSION["prenom"] = $_POST["prenom"];
                    header("location:admin_principal/points_de_vente/point_de_vente.php");
                }else{
                    echo "Mot de passe incorrect";
                }
            }else{
                // ADMINISTRATEUR PAR POINT DE VENTE
                // SELECTION DE prenom ET mot_de_passe DANS LA TABLE admin_par_point_vente
                $slct_par_point_vente = $connexion -> prepare("SELECT prenom, mot_de_passe FROM admin_par_point_vente WHERE prenom = :prenom");
                $slct_par_point_vente -> execute([
                    "prenom" => $prenom
                ]);
                $tab_point_vente = $slct_par_point_vente -> fetchAll();
                $nb_adm_point_vente = count($tab_point_vente);
                if($nb_adm_point_vente > 0){
                    // SELECTION DU MOT DE PASSE
                    $mot_passe_par_point_vente = $tab_point_vente[0]["mot_de_passe"];
                    if($mot_passe_par_point_vente == $mot_de_passe){
                        $_SESSION["prenom"] = $_POST["prenom"];
                        header("location:admin_par_point_vente/gestion_employes/employe.php");
                    }else{
                        ?>
                        <script>
                            $(document).ready(function(){
                                $("#erreur").text("Mot de passe incorrect!!!");
                            })
                        </script>
                        <?php
                    }
                }else{
                    ?>
                    <script>
                        $(document).ready(function(){
                            $("#erreur").text("Ce compte n'existe pas!!!!");
                        })
                    </script>
                    <?php
                }
            }
        }else{
            ?>
            <script>
                $(document).ready(function(){
                    $("#erreur").text("Veuillez tout remplir!!");
                })
            </script>
            <?php
        }
     }
     ?>
</body>
</html>