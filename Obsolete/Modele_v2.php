<?php
//Accès aux données isolé Modèle du MVC, Connection à la base a sa propre fonction
    //Accès aux données, PHP uniquement

    //Renvoie la liste de tous les billets, identifiants décroissants
    function getBillets() 
    {
        $bdd = getBdd(); //Connection à la BD via une fonction
        $billets = $bdd->query('select BIL_ID as id, BIL_DATE as date,' . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET' . ' order by BIL_ID desc'); //Selectionne et rename
        return $billets;
    }

    // Effectue la connexion à la BDD
    // Instancie et renvoie l'objet PDO associé
    //Permet de ne pas avoir à réécrire dans chaque fonctions de modèle
    function getBdd() 
    {
        $bdd = new PDO('mysql:host=localhost;dbname=mvc_tuto;charset=utf8', 'root', '');
        return $bdd;
    }
?>