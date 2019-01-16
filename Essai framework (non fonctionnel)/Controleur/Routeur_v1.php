<?php
    require_once 'Controleur/ControleurAccueil.php';
    require_once 'Controleur/ControleurBillet.php';
    require_once 'Vue/Vue.php';

    class Routeur 
    {
        private $ctrlAccueil;
        private $ctrlBillet;

        public function __construct() 
        {
            $this->ctrlAccueil = new ControleurAccueil();
            $this->ctrlBillet = new ControleurBillet();
        }

        // Traite une requête entrante
        public function routerRequete() 
        {
            try 
            {
                if (isset($_GET['action'])) //Il y a une action renseignée
                {
                    if ($_GET['action'] == 'billet') //L'action est billet
                    {
                        if (isset($_GET['id'])) //L'ID est renseigné
                        {
                            $idBillet = intval($_GET['id']); //Donne la valeur de l'id
                            if ($idBillet != 0) //ID correspond à billet
                            {
                                $this->ctrlBillet->billet($idBillet); //Lance l'affichage
                            }
                            else
                                throw new Exception("Identifiant de billet non valide");
                        }
                        else
                            throw new Exception("Identifiant de billet non défini");
                    }
                    else
                        throw new Exception("Action non valide");
                }
                else 
                { // aucune action définie : affichage de l'accueil
                    $this->ctrlAccueil->accueil();
                }
            }
            catch (Exception $e) 
            {
                $this->erreur($e->getMessage());
            }
        }

        // Affiche une erreur
        private function erreur($msgErreur) 
        {
            $vue = new Vue("Erreur");
            $vue->generer(array('msgErreur' => $msgErreur));
        }
    }
?>