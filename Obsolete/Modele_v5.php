<?php

//Accès aux données isolé Modèle du MVC, orienté objet
//Accès aux données, PHP uniquement

    class Modele
    {
        //Renvoie la liste de tous les billets, identifiants décroissants
        public function getBillets() 
        {
            $bdd = $this->getBdd(); //Connection à la BD via une fonction
            $billets = $bdd->query('select BIL_ID as id, BIL_DATE as date,' . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET' . ' order by BIL_ID desc'); //Selectionne et rename
            return $billets;
        }

        // Effectue la connexion à la BDD
        // Instancie et renvoie l'objet PDO associé
        //Permet de ne pas avoir à réécrire dans chaque fonctions de modèle
        private function getBdd() 
        {
            //array(...) permet de renvoyer les erreurs levées
            $bdd = new PDO('mysql:host=localhost;dbname=mvc_tuto;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            return $bdd;
        }

        // Renvoie les informations sur un billet
        public function getBillet($idBillet) 
        {
            $bdd = $this->getBdd();
            $billet = $bdd->prepare('select BIL_ID as id, BIL_DATE as date,' . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET' . ' where BIL_ID=?'); //Prepare la demande sql sans la variable
            $billet->execute(array($idBillet)); //Execute la commande sql avec la variable
            if ($billet->rowCount() == 1)
                return $billet->fetch(); // Accès à la première ligne de résultat
            else
                throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
        }

        // Renvoie la liste des commentaires associés à un billet
        public function getCommentaires($idBillet) 
        {
            $bdd = $this->getBdd();
            $commentaires = $bdd->prepare('select COM_ID as id, COM_DATE as date,' . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE' . ' where BIL_ID=?'); //Voir fonction getBillet
            $commentaires->execute(array($idBillet));
            return $commentaires;
        }
    }
?>