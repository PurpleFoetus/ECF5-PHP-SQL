<?php

$title = "B.log - Modifier un article";
require_once "./src/partials/header.php";


$article = getArticle($article_id)[0];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['supprimer'])) {
        supprimerArticle($_POST["supprimer"]);
        header("Location: /Blog-AFPA-ECF4/");
    }else{
        if(isset($_POST["titre"]) && isset($_POST["contenu"])){
            $titre = $_POST["titre"];
            $contenu = $_POST["contenu"];
            editerArticle($article_id, $titre, $contenu);
            header("Location: /Blog-AFPA-ECF4/");
        }
    }
}

?>

<main>
    <div class="form-container-wrapper">
        <div class="form-container">
            <form method="POST" action="">
                <button class="delete-button" name="supprimer" value="<?= $article_id ?>">Supprimer la publication</button>
            </form>
            <h1>Formulaire d'édition</h1>
            <form method="POST" action="">
                <label for="title">Titre</label>
                <input type="text" id="title" name="titre" value="<?= $article["titre"] ?>" required>

                <label for="category">Catégorie</label>
                <select id="category" name="category" required>
                    <option value="" disabled selected>Sélectionnez une catégorie</option>
                    <option value="tech">Technologie</option>
                    <option value="health">Santé</option>
                    <option value="travel">Voyage</option>
                    <option value="education">Éducation</option>
                    <option value="lifestyle">Style de vie</option>
                </select>

                <label for="article">Article</label>
                <textarea id="article" name="contenu" rows="10" required><?= $article["contenu"] ?></textarea>

                <div class="form-buttons">
                    <button type="submit" name="modifier" class="save-button">Mettre à jour</button>
                    <button type="reset" class="cancel-button">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php require_once "./src/partials/footer.php"; ?>