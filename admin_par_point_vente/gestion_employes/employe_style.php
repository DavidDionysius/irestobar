<style>
        *{
            margin: 0;
            padding: 0;
            font-family: arial;
        }

        /* ENTETE */
        nav{
            display: flex;
            justify-content: space-between;
            background-color: rgba(0, 0, 150, 0.5);
            padding: 12px 5px;
        }

        nav ul{
            display: flex;
        }

        nav ul li{
            list-style-type: none;
        }

        nav ul li a{
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 15px;
            transition: 1s linear;
            margin-left: 10px;
        }

        nav ul li #actif{
            border-bottom: 2px solid black;
        }
        nav ul li a:hover{
            background-color: blue;
        }

        /* CONTENEUR */
        .conteneur{
            display: flex;
        }

        /* STYLYSATION DE FORMULARIE */
        #formulaire{
            width: 50%;
            background-color: rgba(0, 0, 150, 0.5);
            margin: 25px auto;
            padding: 20px;
            border-radius: 15px;
        }

        #formulaire div, #formulaire_modification div{
            margin-bottom: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #formulaire div label, #formulaire_modification div label{
            display: inline-block;
            width: 250px;
            font-weight: bold;
            text-align: right;
            margin-right: 10px;
        }

        #formulaire div select, #formulaire_modification div select{
            padding: 5px 10px;
            border-radius: 10px;
        }

        #formulaire div input[type="number"], #formulaire_modification div input[type="number"]{
            width: 135px;
            height: 30px;
            border-radius: 10px;
            border: none;
            text-align: center;
        }

        #formulaire div input[type="text"], #formulaire_modification div input[type="text"]{
            width: 300px;
            height: 30px;
            border-radius: 10px;
            border: none;
            text-align: center;
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

        /* SELECTION */
        table{
            width: 95%;
            margin: 10px auto;
            border-collapse: collapse;
        }

        #thNom{
            width: 25%;
        }

        #thDtns{
            width: 15%;
        }

        #thCin, #thContact{
            width: 12%;
        }

        #thActions{
            width: 22%;
        }

        table tr th{
            padding: 5px 0;
        }

        table tr td{
            padding: 4px 0 4px 5px;
        }

        #tdActions{
            text-align: center;
        }

        #modifier{
            border: none;
            padding: 7px 22px;
            cursor: pointer;
            background-color: rgba(0, 0, 150, 0.5);
            border-radius: 7px;
            margin-right: 10px;
        }

        #modifier:hover{
            background-color: rgba(0, 0, 150, 0.7);
        }

        #supprimer{
            border: none;
            padding: 7px 22px;
            cursor: pointer;
            background-color: rgba(0, 0, 150, 0.7);
            border-radius: 7px;
        }

        #supprimer:hover{
            background-color: rgba(0, 0, 150, 0.5);
        }

        /* MODIFICATION (14-04-2025) */
        .conteneur_modification{
            position: fixed;
            background-color: rgba(0, 0, 150, 0.7);
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: none;
        }

        #formulaire_modification{
            width: 50%;
            background-color: rgba(255, 255, 255, 1);
            margin: 50px auto;
            padding: 20px;
            border-radius: 15px;
            position: relative;
        }

        #fermer{
            position: absolute;
            top: -15px;
            right: -15px;
            padding: 9px 13px;
            border: none;
            background-color: red;
            color: white;
            font-weight: bold;
            border-radius: 100%;
            cursor: pointer;
        }

        #formulaire_modification div input[type="number"]{
            width: 135px;
            height: 30px;
            border-radius: 10px;
            border: 1px solid black;
            text-align: center;
        }

        #formulaire_modification div input[type="text"]{
            width: 300px;
            height: 30px;
            border-radius: 10px;
            border: 1px solid black;
            text-align: center;
        }
         /* KETRIKA SEUL */
        /* SUPPRESSION */
        .cont_supprimer{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 150, 0.8);
            display: none;
        }

        .cont_question{
            width: 40%;
            height: 130px;
            background-color: white;
            margin: 200px auto;
            border-radius: 15px;
            padding: 10px 0;
        }
        .cont_question{
            width: 40%;
            height: 130px;
            background-color: white;
            margin: 200px auto;
            border-radius: 15px;
            padding: 10px 0;
        }

        .cont_question h2{
            text-align: center;
            margin-bottom: 30px;
        }

        .cont_boutons{
            text-align: center;
        }

        #accepter{
            border: none;
            padding: 10px 50px;
            cursor: pointer;
            background-color: rgba(0, 0, 150, 0.5);
            border-radius: 7px;
            margin-right: 10px;
        }

        #accepter:hover{
            background-color: rgba(0, 0, 150, 0.7);
        }

        #refuser{
            border: none;
            padding: 10px 50px;
            cursor: pointer;
            background-color: rgba(0, 0, 150, 0.7);
            border-radius: 7px;
        }

        #refuser:hover{
            background-color: rgba(0, 0, 150, 0.5);
        }
         /* FIN KETRIKA SEUL */
    </style>