<?php

$article = getArticle($article_id)[0];

$title = "B.log - " . $article["titre"];
require_once "./src/partials/header.php";
require_once "./src/model/commentaires.php";
require_once "./src/model/utilisateurs.php";
require_once "./src/model/categories.php";

if (isset($_SESSION["user_mail"])) {
    $utilisateur = getUtilisateur($_SESSION["user_mail"]);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['supprimer'])) {
        supprimerArticle($_POST["supprimer"]);
        header("Location: /Blog-AFPA-ECF4");
    }

    if (isset($_POST["modifier"])) {
        header("Location: /Blog-AFPA-ECF4/modifier-" . $_POST["modifier"]);
    }

    if (isset($_POST["new-comment"]) && isset($utilisateur['id'])) {
        ajouterCommentaire($utilisateur['id'], $_POST["new-comment"], $article_id);
    }
}


?>

<main>
    <div class="form-container-wrapper">
        <div class="form-container">
            <?php if (isset($utilisateur)) :
                if ($utilisateur["id"] == $article["auteur"]) : ?>
                    <form method="POST" action="">
                        <button class="edit-button" name="modifier" value="<?= $article_id ?>">Modifier</button>
                        <button class="delete-button" name="supprimer" value="<?= $article_id ?>">Supprimer la publication</button>
                    </form>
            <?php endif;
            endif; ?>
            <form>
                <article classe="article">
                    <h1><?= $article["titre"] ?></h1>
                    <div class="article-content">
                        <?php $categorie = recupererCategorie($article["catégorie"]); ?>
                        <h2 class="commentaire"> Catégorie : <?= $categorie[0]["nom"] ?> </h2>
                        <p id="article"><?= $article["contenu"] ?></p>
                        <p>Auteur : <?= $article["pseudo"] ?></p>
                        <p>Ecrit le <?= $article["date"] ?></p>
                    </div>
                </article>
                <hr>
                <h2 class="commentaire">Commentaires</h2>
                <?php
                $commentaires = recupererCommentairesArticle($article_id);

                foreach ($commentaires as $commentaire) : ?>
                    <div class="article-content">
                        <h3 class="commentaire"><?= $commentaire["pseudo"] ?></h3>
                        <p><?= $commentaire["contenu"] ?></p>
                        <p><?= $commentaire["date"] ?></p>
                    </div>
                    <hr>
                <?php endforeach; ?>
            </form>
            <?php if (isset($_SESSION["user_mail"])) : ?>
                <form method="POST" action="">
                    <label for="new-comment">Formulaire d'ajout de commentaire</label>
                    <textarea id="new-comment" name="new-comment" rows="5" required></textarea>

                    <div class="form-buttons">
                        <button type="submit" class="save-button">Ajouter</button>
                        <button type="reset" class="cancel-button">Annuler</button>
                    </div>
                </form>
            <?php else : ?>
                <p class="error">Pour poster un commentaire, veuillez vous <a href="/Blog-AFPA-ECF4/login">connecter</a>.
                <?php endif; ?>
        </div>
    </div>
</main>

<?php
require_once "./src/partials/footer.php";
?>