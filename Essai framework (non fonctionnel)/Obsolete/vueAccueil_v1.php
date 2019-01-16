<!--Affichage, PHP et HTML-->
<!--Affichage séparé-->

<!doctype html>
<html lang="fr"> <!-- Permet de dire que le site est en fr -->
    <head>
        <meta charset="utf-8"/> <!--Encodage en utf-8 pour les accès etc...-->
        <link rel="stylesheet" href="style.css"/> <!--Renvoie au css-->
        <Title>Mon Blog</Title> <!--Titre de la page dans le navigateur (onglet)-->        
    </head>
    <body>
        <div id="global">
            <header>
                <a ref="index.php"><h1 id="titreBlog">Mon Blog</h1></a> <!--Titre de la page sur la page-->
                <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
            </header>
            <div id="contenu">
                <?php
                    foreach ($billets as $billet): ?> <!--Boucle pour l'affichage de chaque ligne de la table-->
                        <article> <!--Nouvel balise du HTML5-->
                            <header>
                             <h1 class="titreBillet"><?= $billet['titre'] ?></h1> <!--Va rechercher le titre dans la table-->
                                <time><?= $billet['date'] ?></time> <!--Va rechercher la date et l'heure dans la table-->
                            </header>
                            <p><?= $billet['contenu'] ?></p> <!--Va rechercher le texte du billet-->
                        </article>
                        <hr />
                    <?php endforeach; ?> <!--Fin de la boucle-->
            </div> <!--Fin contenu-->
            <footer id="piedBlog">
                Blog réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!--Fin global-->
    </body>
</html>