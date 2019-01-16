<?php

//Accès aux données isolé Modèle du MVC, orienté objet, classe abstraite
//Accès aux données, PHP uniquement


    abstract class Modele
    {
        // Objet PDO d'accès à la BD
        private $bdd;

        // Exécute une requête SQL éventuellement paramétrée
        protected function executerRequete($sql, $params = null) 
        {
            if ($params == null) 
            {
                $resultat = $this->getBdd()->query($sql); // exécution directe
            }
            else 
            {
                $resultat = $this->getBdd()->prepare($sql); // requête préparée
                $resultat->execute($params);
            }
            return $resultat;
        }
        
        // Effectue la connexion à la BDD
        // Instancie et renvoie l'objet PDO associé
        //Permet de ne pas avoir à réécrire dans chaque fonctions de modèle
        // Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
        private function getBdd() 
        {
            if ($this->bdd == null) 
            {
                // Création de la connexion
                $this->bdd = new PDO('mysql:host=localhost;dbname=mvc_tuto;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            return $this->bdd;
        }
    }
?>
