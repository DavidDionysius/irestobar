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
            background-color: rgba(0, 0, 150, 0.5);
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
    </form>

    <!-- CONNEXION -->
     <?php
     if(isset($_POST["valider"])){
        $prenom = $_POST["prenom"];
        $mot_de_passe = $_POST["password"];

        if($prenom != "" && $mot_de_passe != ""){
            if($prenom == "irestobar"){
                if($mot_de_passe == "irestobar"){
                    $_SESSION["prenom"] = $_POST["prenom"];
                    header("location:admin_principal/points_de_vente/point_de_vente.php");
                }else{
                    echo "Mot de passe incorrect";
                }
            }else{
                echo "Vérifier votre prénom";
            }
        }else{
            echo "Veuillez tout remplir";
        }
     }
     ?>
</body>
</html>