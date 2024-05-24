<?php

$title = "B.log - Ajouter un article";
require_once "./src/partials/header.php";
require_once "./src/model/articles.php";
require_once "./src/model/utilisateurs.php";
if(isset($_SESSION["user_mail"])):
    $utilisateur = getUtilisateur($_SESSION['user_mail']);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contenu = $_POST["contenu"];
    $titre = $_POST["titre"];
    $categorie = $_POST["catégorie"];
    ajouterArticle($utilisateur["id"], $contenu, $titre, $categorie);
    header("Location: /Blog-AFPA-ECF4/");
    }
?>

<main>
    <div class="form-container-wrapper">
        <div class="form-container">
            <h1>Formulaire de création</h1>
            <form method="POST" action="">
                <label for="titre">Titre</label>
                <input type="text" id="titre" name="titre" required>

                <label for="catégorie">Catégorie</label>
                <select id="category" name="catégorie" required>
                    <option value="" disabled selected>Sélectionnez une catégorie</option>
                    <?php $cat = recupererCategories();
                    foreach ($cat as $category) :
                    ?>
                        <option value="<?= $category["nom"] ?>"><?= $category["nom"] ?></option>
                    <?php endforeach; ?>

                </select>

                <label for="contenu">Article</label>
                <textarea id="contenu" name="contenu" rows="10" required></textarea>

                <div class="form-buttons">
                    <button type="submit" class="save-button">Enregistrer</button>
                    <button type="reset" class="cancel-button">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</main>


<?php
require_once "./src/partials/footer.php";
else:
    header("Location: /Blog-AFPA-ECF4/login");
endif;
?>
