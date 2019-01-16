<!--Affichage, PHP et HTML, Vue du MVC (pour la page d'accueil)-->

<?php $titre = 'Mon Blog'; ?> <!--Définit le titre-->
<?php ob_start(); ?> <!--Lance le stockage du flux en mémoire-->   
<?php foreach ($billets as $billet): ?> <!-- Recrée les articles-->
    <article>
        <header>
            <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
            <time><?= $billet['date'] ?></time>
        </header>
        <p><?= $billet['contenu'] ?></p>
    </article>
    <hr />
    <?php endforeach; ?>
    <?php $contenu = ob_get_clean(); ?> <!--Récupère la mémoire et l'assigne à contenu-->
<?php require 'gabarit.php'; ?> <!--Appelle gabarit pour afficher le site avec Titre et Contenu spécifiques-->