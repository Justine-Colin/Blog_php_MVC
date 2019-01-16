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
                if (isset($_GET['action'])) //Il y a une cation renseignée
                {
                    if ($_GET['action'] == 'billet') //L'action est billet
                    {
                        $idBillet = intval($this->getParametre($_GET, 'id')); //Donne la valeur de l'ID
                        if ($idBillet != 0) //ID correspond à billet
                        {
                            $this->ctrlBillet->billet($idBillet); //Lance l'affichage
                        }
                        else
                            throw new Exception("Identifiant de billet non valide");
                    }
                    else if ($_GET['action'] == 'commenter') //Ajout d'un commentaire
                    {
                        $auteur = $this->getParametre($_POST, 'auteur'); //Récupère le contenu du champs pseudo
                        $contenu = $this->getParametre($_POST, 'contenu'); //Récupère le contenu du champs comment
                        $idBillet = $this->getParametre($_POST, 'id'); //Récupère le contenu du champs id
                        $this->ctrlBillet->commenter($auteur, $contenu, $idBillet);
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

        private function getParametre($tableau, $nom) 
        {
            if (isset($tableau[$nom])) //Il existe un tableau avec un eléméent précis dedans
            {
                return $tableau[$nom];
            }
            else
                throw new Exception("Paramètre '$nom' absent");
        }
    }
?>