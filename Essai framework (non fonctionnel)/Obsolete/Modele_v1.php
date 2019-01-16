<?php
//Accès aux données isolé Modèle du MVC
    //Accès aux données, PHP uniquement

    //Renvoie la liste de tous les billets, identifiants décroissants
    function getBillets() 
    {
        $bdd = new PDO('mysql:host=localhost;dbname=mvc_tuto;charset=utf8', 'root', ''); //Connection à la BD
        $billets = $bdd->query('select BIL_ID as id, BIL_DATE as date,' . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET' . ' order by BIL_ID desc'); //Selectionne et rename
        return $billets;
    }
?>