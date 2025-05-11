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

    /* STYLISATION DE FORMULAIRE */
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

    #formulaire div #indice, #formulaire_modification div label{
        display: inline-block;
        width: 250px;
        font-weight: bold;
        text-align: right;
        margin-right: 10px;
    }

    #formulaire div input[type="text"], #formulaire_modification div input[type="text"]{
        width: 300px;
        height: 30px;
        border-radius: 10px;
        border: none;
        text-align: center;
    }

    #categorie, #categorie_modifier{
        width: 300px;
        padding: 6px 0;
        text-align: center;
        border-radius: 10px;
    }

    #cont_checkbox{
        display: flex;
        flex-direction: column;
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

    #cont_emballage{
        display: flex;
        justify-content: center;
    }

    #cont_emballage_modifier{
        display: flex;
        justify-content: center;
        height: 300px;
        overflow-y: auto;
        padding-top: 100px;
    }

    #liste_emballage, #liste_emballage_modifier{
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: flex-start;
    }

    #liste_emballage label{
        width: 300px;
        margin-bottom: 10px;
    }

    #label_sans_emballage{
        font-style: italic;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .unite_par_emballage{
        display: none;
        width: 250px;
        margin-left: 30px;
    }

    #cont_chaque_unite{
        display: flex;
        justify-content: flex-start;
    }

    .champ_unite{
        width: 125px;
        height: 20px;
        border-radius: 7px;
        text-align: center;
    }

    #label_unite{
        display: inline-block;
        width: 100px;
        text-align: right;
    }

    /* SELECTION */
    #tableau{
        width: 90%;
        margin: 0 auto;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    #tableau caption{
        font-weight: bold;
        text-transform: uppercase;
        background-color: rgba(0, 0, 150, 0.5);
        padding: 5px 0;
    }

    #tableau tr th{
        padding: 3px 0;
    }

    #thArticle{
        width: 25%;
    }

    #thEmballage{
        width: 25%;
    }

    #thUnite{
        width: 25%;
    }

    #thActions{
        width: 25%;
    }

    #td_actions{
        text-align: center;
        padding: 3px 0;
    }

    .espace_gauche{
        padding: 3px 0 3px 5px;
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
        width: 50%;
        height: 140px;
        background-color: white;
        margin: 150px auto;
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

    #nom_article_supprimer{
        font-style: italic;
        color: rgb(0, 0, 150);
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
        margin: 40px auto;
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

    #formulaire_modifier #alignement_droit{
        text-align: right;
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

    #cont_unite_mod{
        width: 250px;
        display: flex;
        align-items: center;
        margin-left: 50px;
    }

    #cont_unite_mod label{
        text-align: right;
    }

    #cont_unite_mod input{
        width: 100px;
        height: 30px;
        border-radius: 10px;
        text-align: center;
    }
</style>