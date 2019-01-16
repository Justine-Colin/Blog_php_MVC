<?php   
    //Lien entre les pages, PHP uniquement
    //Correspond au controleur de MVC
    //Accès au données
    require 'Modele.php';
    $billets = getBillets();

    //Affichage (dans un autre fichier)
    require 'vueAccueil.php'; //Inclut et exécute le fichier spécifié
?>