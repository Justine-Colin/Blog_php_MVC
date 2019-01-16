<!--Devient un contrôleur frontal
<?php 
    require('./Controleur/Controleur.php');

    //Gestion des erreurs
    try 
    {
        if (isset($_GET['action'])) //Il y a une action spécifiée
        {
            if ($_GET['action'] == 'billet') //Affichage un billet
            {
                if (isset($_GET['id'])) //Il y a un id de billet
                {
                    $idBillet = intval($_GET['id']);
                    if ($idBillet != 0) //Si le paramètre demande un billet
                        billet($idBillet);
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
        {
            accueil(); // action par défaut
        }
    }
    catch (Exception $e) 
    {
        erreur($e->getMessage());
    }
?>