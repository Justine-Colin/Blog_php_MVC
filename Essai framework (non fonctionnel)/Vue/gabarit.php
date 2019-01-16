<!--Norme d'affichage pour toutes les pages du sites, fait partie des Vues-->
<!--Template-->

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $racineWeb ?>" > <!--Permet l'utilisation d'urls simplifiées-->
        <link rel="stylesheet" href="./Contenu/style.css" />
        <title><?= $titre ?></title> <!-- Élément spécifique -->
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreBlog">Mon Blog</h1></a> <!--Click sur titre renvoie à index-->
                <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
            </header>
            <div id="contenu">
                <?= $contenu ?> <!-- Élément spécifique --> <!--On va le rechercher ailleurs-->
            </div>
            <footer id="piedBlog">
                Blog réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>