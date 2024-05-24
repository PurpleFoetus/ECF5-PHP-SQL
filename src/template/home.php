<?php

$title = "B.log - Accueil";
require_once "./src/partials/header.php";
require_once "./src/model/articles.php";
require_once "./src/model/utilisateurs.php";

if(isset($_SESSION["user_mail"])){
    $utilisateur = getUtilisateur($_SESSION["user_mail"]);
} ?>
<main>
    <h1>B.log Articles</h1>
    <div class="articles-container-wrapper">
        <div class="articles-container">
            <?php $articles = getAllArticles();
            $i = 0;
            foreach ($articles as $article) : ?>
                <article class="article article-<?= $i % 6 + 1 ?>">
                    <img src="./assets/img/profil<?= $i % 6 + 1 ?>.jpg" alt="Image de l'article <?= $i + 1 ?>">
                    <div class="article-content">
                        <a href="/Blog-AFPA-ECF4/article-<?= $article["id"] ?>"><h2><?= $article["titre"] ?></h2></a>
                        <p><?= (strlen($article["contenu"]) > 103) ? substr($article["contenu"],0,100).'...' : $article["contenu"]; ?></p>
                    </div>
                    <div class="icons">
                        <?php if(isset($utilisateur)):
                            if($utilisateur["id"] == $article["auteur"]): ?>
                               <a href="/Blog-AFPA-ECF4/modifier-<?= $article["id"] ?>"><i class="fas fa-edit"></i></a>
                                <?php 
                                endif;
                            endif;
                            ?>
                        <i class="fas fa-comment"></i>
                    </div>
                </article>
            <?php $i++;
                endforeach; ?>

        </div>
    </div>
</main>

<?php
require_once "./src/partials/footer.php";
?>