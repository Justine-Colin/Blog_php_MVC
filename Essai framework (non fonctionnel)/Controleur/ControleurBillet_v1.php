<?php
    require_once 'Modele/Billet.php';
    require_once 'Modele/Commentaire.php';
    require_once 'Vue/Vue.php';

    class ControleurBillet 
    {
        private $billet;
        private $commentaire;

        public function __construct() 
        {
            $this->billet = new Billet();
            $this->commentaire = new Commentaire();
        }  

        // Affiche les détails sur un billet
        public function billet($idBillet) 
        {
            $billet = $this->billet->getBillet($idBillet); //Récupère le billet
            $commentaires = $this->commentaire->getCommentaires($idBillet); //RTécupère les commentaires du billet
            $vue = new Vue("Billet");
            $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
        }
    }
?>