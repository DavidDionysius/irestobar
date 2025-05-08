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
        min-width: 200px;
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

    #categorie{
        width: 300px;
        padding: 6px 0;
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
    .carree{
        width: 400px;
        height: 400px;
        background-color: blue;
    }

    /* SELECTION */
    table{
        margin: 0 auto;
        width: 98%;
        border-collapse: collapse;
    }

    #tr_categorie{
        border-top: 2px solid blue;
    }

    #modifier, #ajouter_unite{
        border: none;
        padding: 7px 22px;
        cursor: pointer;
        background-color: rgba(0, 0, 150, 0.5);
        border-radius: 7px;
        margin-right: 10px;
    }

    #modifier:hover, #ajouter_unite:hover{
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

    #th_categorie{
        width: 15%;
        padding: 5px 0;
    }

    #th_emballage{
        width: 15%;
    }

    #th_unite{
        width: 30%;
        text-align: center;
    }

    #th_action{
        width: 30%;
        padding-left: 15px;
    }

    #td_actions{
        text-align: center;
        padding: 3px 0;
    }

    .espace_gauche{
        padding: 5px 3px;
    }

    .td_categorie{
        padding: 5px 5px;
    }

    /* ACTIONS POUR UNITE */
    #modifier_unite{
        border: none;
        padding: 5px 12px;
        cursor: pointer;
        background-color: rgba(0, 0, 150, 0.5);
        border-radius: 7px;
        margin-right: 10px;
    }

    #modifier_unite:hover{
        background-color: rgba(0, 0, 150, 0.7);
    }

    #supprimer_unite{
        border: none;
        padding: 5px 12px;
        cursor: pointer;
        background-color: rgba(0, 0, 150, 0.7);
        border-radius: 7px;
        margin-left: 15px;
    }

    #supprimer_unite:hover{
        background-color: rgba(0, 0, 150, 0.5);
    }

    .td_btn_unite{
        text-align: center;
    }

    /* MODIFICATION (11-04-2025) */
    .cont_modifier, .cont_ajout_unite, .cont_modifier_unite{
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

    #fermer_modification, #fermer_modification_ajout_unite, #fermer_modification_unite{
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

    #formulaire_modifier div, #formulaire_modifier_ajout_unite div{
        margin-bottom: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    #formulaire_modifier div label{
        display: inline-block;
        width: 250px;
        font-weight: bold;
        text-align: right;
        margin-right: 10px;
    }

    #formulaire_modifier div input[type="text"], #formulaire_modifier_ajout_unite div input[type="text"]{
        width: 300px;
        height: 30px;
        border-radius: 10px;
        border: 1px solid black;
        text-align: center;
        color: black;
    }

    #bouton_modifier, #bouton_ajouter_unite, #bouton_modifier_unite{
        border: none;
        padding: 10px 40px;
        cursor: pointer;
        background-color: rgba(0, 0, 150, 0.5);
        border-radius: 7px;
        margin-right: 10px;
        color: white;
        font-weight: bold;
    }

    #bouton_modifier:hover, #bouton_ajouter_unite{
        background-color: rgba(0, 0, 150, 0.7);
    }

    /* SUPPRESSION */
    .cont_supprimer, .cont_supprimer_unite{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 150, 0.8);
        display: none;
    }

    .cont_question{
        width: 45%;
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

    #accepter, #accepter_suppression_unite{
        border: none;
        padding: 10px 50px;
        cursor: pointer;
        background-color: rgba(0, 0, 150, 0.5);
        border-radius: 7px;
        margin-right: 10px;
    }

    #accepter:hover, #accepter_suppression_unite:hover{
        background-color: rgba(0, 0, 150, 0.7);
    }

    #refuser, #refuser_suppression_unite{
        border: none;
        padding: 10px 50px;
        cursor: pointer;
        background-color: rgba(0, 0, 150, 0.7);
        border-radius: 7px;
    }

    #refuser:hover, #refuser_suppression_unite:hover{
        background-color: rgba(0, 0, 150, 0.5);
    }

    #nom_emballage, #nom_unite{
        font-style: italic;
        color: rgb(0, 0, 150);
    }

    /* FORMULAIRE AJOUT D'UNITE */
    #formulaire_modifier_ajout_unite{
        position: relative;
        width: 60%;
        background-color: white;
        margin: 200px auto;
        padding: 20px;
        border-radius: 15px;
    }

    #formulaire_modifier_ajout_unite div label{
        display: inline-block;
        width: 400px;
        font-weight: bold;
        text-align: right;
        margin-right: 10px;
    }
</style>