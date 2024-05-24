<?php
$title = "B.log - Connexion";
require_once "./src/partials/header.php";
require_once "./src/model/utilisateurs.php";

$error = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $mail = $_POST["email"];
    $password = $_POST["password"];

    $user = authUtilisateur($mail, $password);
    if ($user !== -1) {
        $_SESSION["user_mail"] = $user;
        header("Location: /Blog-AFPA-ECF4");
    }else{
        $error = true;
    }
}

?>

<main>
    <div class="form-container-wrapper">
        <div class="form-container">
            <h1>Connexion</h1>
            <p class="inscription">Bon retour parmi nous.</p>
            <?= !$error ? "" : "<p class='error'>ERRREUR : L'addresse e-mail ou le mot de passe que vous avez rentrez est incorrecte.</p>"; ?>
            <form method="POST" action="">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>

                <a href="#" class="forgot-password">Mot de passe oublié ?</a>

                <div class="form-buttons">
                    <button type="submit" name="connexion" class="save-button">Connexion</button>
                    <a type="button" class="save-button" href="/Blog-AFPA-ECF4/inscription">Inscription</a>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
require_once "./src/partials/footer.php";
?>