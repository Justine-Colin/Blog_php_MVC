<?php   
    //Lien entre les pages, PHP uniquement
    //Correspond au controleur de MVC
    //Accès au données
    require 'Modele.php';

    //Gestion des erreurs
    try 
    {
        $billets = getBillets();
        require 'vueAccueil.php';
    }
    catch (Exception $e) 
    {
        //echo '<html><body>Erreur ! ' . $e->getMessage() . '</body></html>'; //Renvoie un message d'erreur à l'utilisateur avec l'exception levée inclue, page simple
        $msgErreur = $e->getMessage();
        require 'vueErreur.php'; //Renvoie un message d'erreur à l'utilisateur avec l'exception levée inclue, page avec gabarit
    }
?>