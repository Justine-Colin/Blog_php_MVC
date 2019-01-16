<!--Contrôleur pour les billets, inutile après l'implémentation du contrôleur frontal-->
<?php
    require 'Modele.php';
    try 
    {
        if (isset($_GET['id'])) //Il y a un paramètre
        {
            // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
            $id = intval($_GET['id']);
            if ($id != 0) //Si paramètre demande un billet
            {
                $billet = getBillet($id);
                $commentaires = getCommentaires($id);
                require 'vueBillet.php';
            }
            else
                throw new Exception("Identifiant de billet incorrect");
        }
        else
            throw new Exception("Aucun identifiant de billet");
    }
    catch (Exception $e) //Si problème
    {
        $msgErreur = $e->getMessage();
        require 'vueErreur.php';
    }
?>