<?php
    class CompteBancaire
    {
        //Déclaration variable
        private $devise; //pas de type, seulement un niveau de protection
        private $solde;
        private $titulaire;

        public function __construct($devise, $solde, $titulaire) //Constructeur
        {
            $this->devise = $devise;
            $this->solde = $solde;
            $this->titulaire = $titulaire;
        }

        public function getDevise()
        {
            return $this->devise;
        }        

        public function getSolde()
        {
            return $this->solde;
        }

        protected function setSolde($solde)
        {
            $this->solde = $solde;
        }

        public function getTitulaire()
        {
            return $this->titulaire;
        }

        public function crediter($montant) //Ajout-retrait argent sur le compte
        {
            $this->solde += $montant;
        }

        public function __toString() //Affichage du solde
        {
            return "Le solde du compte de $this->titulaire est de " .
            $this->solde . " " . $this->devise;
        }
    }
?>