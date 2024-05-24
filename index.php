<?php

require_once "./src/model/articles.php";
require_once "./src/model/categories.php";

session_start();

$routes = [];

route('/Blog-AFPA-ECF4', function () {
    require_once "./src/template/home.php";
    echo "<br>";
});

route('/Blog-AFPA-ECF4/login', function () {
    require_once "./src/template/connexion.php";
});

route('/Blog-AFPA-ECF4/logout', function () {
    require_once "./src/template/deconnexion.php";
});

route('/Blog-AFPA-ECF4/inscription', function () {
    require_once "./src/template/inscription.php";
});

route('/Blog-AFPA-ECF4/ajout', function () {
    require_once "./src/template/ajouter.php";
});

route('/Blog-AFPA-ECF4/article-', function ($id) {
    $article_id = $id;
    require_once "./src/template/article.php";
});

route('/Blog-AFPA-ECF4/modifier-', function ($id) {
    $article_id = $id;
    require_once "./src/template/modifier.php";
});

route('/Blog-AFPA-ECF4/rgpd', function () {
    require_once "./src/template/rgpd.php";
});

function route(string $path, callable $callback)
{
    global $routes;
    $routes[$path] = $callback;
}

run();

function run()
{
    global $routes;
    $uri = $_SERVER['REQUEST_URI'];
    $found = false;
    foreach ($routes as $path => $callback) {

        // echo $path;
        // echo "<br>";
        // echo preg_match('/(\/Blog-AFPA-ECF4\/article-*)./', $path);
        // echo "<br>";

        if (preg_match('/(\/Blog-AFPA-ECF4\/article-*)./', $path) == 1 && preg_match('/(\/Blog-AFPA-ECF4\/article-*)./', $uri) == 1) {
            $id = preg_replace('/(\/Blog-AFPA-ECF4\/article-)/', '', $uri);
            $found = true;
            $callback($id);
        }
        if (preg_match('/(\/Blog-AFPA-ECF4\/modifier-*)./', $path) == 1 && preg_match('/(\/Blog-AFPA-ECF4\/modifier-*)./', $uri) == 1) {
            $id = preg_replace('/(\/Blog-AFPA-ECF4\/modifier-)/', '', $uri);
            $found = true;
            $callback($id);
        }
        if ($path !== $uri) continue;

        $found = true;
        $callback();
    }

    if (!$found) {
        $notFoundCallback = $routes['/Blog-AFPA-ECF4'];
        $notFoundCallback();
    }
}
