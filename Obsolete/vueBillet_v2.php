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