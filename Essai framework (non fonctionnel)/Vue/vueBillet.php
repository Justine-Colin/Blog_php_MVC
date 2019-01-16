<!--Affichage des données d'un billet-->
<?php $titre = "Mon Blog - " . $billet['titre']; ?>
<article> <!--Billet en lui-même-->
    <header> <!--Info titre/date billet-->
        <h1 class="titreBillet"><?= $billet['titre'] ?></h1> 
        <time><?= $billet['date'] ?></time>
    </header>
    <p><?= $billet['contenu'] ?></p> <!--Contenu du billet-->
</article>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $billet['titre'] ?></h1> <!--Affichage des commentaires-->
</header>
<?php foreach ($commentaires as $commentaire): ?> <!--On va rechercher tous les commentaires-->
    <p><?= $commentaire['auteur'] ?> dit :</p>
    <p><?= $commentaire['contenu'] ?></p>
<?php endforeach; ?>

<!--Formulaire à remplir pour ajouter un comment-->
<form method="post" action="index.php?action=commenter"> 
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" required /><br /> <!--Crée le champs pseudo et le rend obligatoire-->
    <textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire" required></textarea><br /> <!--Crée le champs comment et le rend obligatoire-->
    <input type="hidden" name="id" value="<?= $billet['id'] ?>" /> <!--Crée un champs invisible renseignant l'id-->
    <input type="submit" value="Commenter" /> <!--Crée le bouton pour ajouter-->
</form>