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

    /* STYLYSATION DE FORMULARIE */
    #formulaire{
        width: 50%;
        background-color: rgba(0, 0, 150, 0.5);
        margin: 25px auto;
        padding: 20px;
        border-radius: 15px;
    }

    #formulaire div{
        margin-bottom: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #formulaire div label{
        display: inline-block;
        width: 250px;
        font-weight: bold;
        text-align: right;
        margin-right: 10px;
    }

    #formulaire div input[type="text"]{
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
    .carree{
        width: 400px;
        height: 400px;
        background-color: blue;
    }

    /* SELECTION */
    table{
        margin: 0 auto;
        width: 65%;
        border-collapse: collapse;
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

    #th_rang{
        width: 10%;
        padding: 5px 0;
    }

    #th_nom{
        width: 50%;
    }

    #td_rang{
        text-align: center;
    }

    #td_nom{
        padding-left: 15px;
    }

    #td_actions{
        text-align: center;
        padding: 3px 0;
    }

    /* MODIFICATION (11-04-2025) */
    .cont_modifier{
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 150, 0.8);
        display: none;
    }

    #formulaire_modifier{
        position: relative;
        width: 50%;
        background-color: white;
        margin: 200px auto;
        padding: 20px;
        border-radius: 15px;
    }

    #fermer_modification{
        position: absolute;
        right: -20px;
        top: -18px;
        padding: 8px 15px;
        border-radius: 100%;
        font-size: 20px;
        background-color: red;
        color: white;
        font-weight: bold;
        border: none;
        cursor: pointer;
    }

    #formulaire_modifier div{
        margin-bottom: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #formulaire_modifier div label{
        display: inline-block;
        width: 250px;
        font-weight: bold;
        text-align: right;
        margin-right: 10px;
    }

    #formulaire_modifier div input[type="text"]{
        width: 300px;
        height: 30px;
        border-radius: 10px;
        border: 1px solid black;
        text-align: center;
        color: black;
    }

    #bouton_modifier{
        border: none;
        padding: 10px 40px;
        cursor: pointer;
        background-color: rgba(0, 0, 150, 0.5);
        border-radius: 7px;
        margin-right: 10px;
        color: white;
        font-weight: bold;
    }

    #bouton_modifier:hover{
        background-color: rgba(0, 0, 150, 0.7);
    }

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

    #nom_emballage{
        font-style: italic;
        color: rgb(0, 0, 150);
    }
</style>