<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="B.log - Blog d'articles divers et variés">
    <meta name="keywords" content="blog, articles, B.log, informations">
    <meta name="author" content="Votre Nom">
    <meta property="og:title" content="B.log">
    <meta property="og:description" content="Découvrez des articles intéressants sur B.log.">
    <meta property="og:image" content="URL_de_l'image_de_prévisualisation">
    <meta property="og:url" content="URL_de_votre_site">
    <title><?= $title ?></title>
    <link rel="icon" type="image/x-icon" href="./assets/img/B.png">
    <link href="./assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">      <!--Font Awesome -->
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="./assets/img/B.png" title="logo" alt="Logo de B.log" /> <!--à voir pour faire un href au clic logo-->
        </div>
        <nav class="navbar">
            <div class="container-fluid">
                <ul class="navbar">
                    <li class="nav-item"><a class="nav-link" href="/Blog-AFPA-ECF4">Accueil</a></li>
                    <?php if(isset($_SESSION["user_mail"])): ?>
                        <li class="nav-item">|</li>
                        <li class="nav-item"><a class="nav-link" href="/Blog-AFPA-ECF4/ajout">Ajouter</a></li>
                    <?php  endif; ?>
                </ul>
            </div>
        </nav>
        <div class="profile-section">
            <div class="profile-icon">
                <img src="./assets/img/user.png" alt="Icône de profil" class="profile-icon-image">
            </div>
            <?php if(isset($_SESSION["user_mail"])): ?>
                <a href="/Blog-AFPA-ECF4/logout" class="login-link">SE DECONNECTER</a>
            <?php else: ?>
                <a href="/Blog-AFPA-ECF4/login" class="login-link">SE CONNECTER</a>
            <?php endif?>
        </div>
    </header>