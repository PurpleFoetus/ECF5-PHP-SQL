<?php
require_once 'db.php';

function verifierUtilisateur($mail)
{
    $bdd = connectToBdd();

    // 1 preparer la requete
    $query = $bdd->prepare('SELECT * FROM utilisateurs WHERE mail = ?');
    // 2 executer la requete
    $query->execute([$mail]);
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    return (count($users) > 0) ? true : false;
}

//ajouter un utilisateur
function ajoutUtilisateur($nom, $prenom, $pseudo, $mail, $mdp)
{
    $bdd = connectToBdd();
    $result = false;
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
        if (!verifierUtilisateur($mail)) {

            $hash = password_hash($mdp, PASSWORD_BCRYPT);
            // Préparation de la requête SQL
            $query = $bdd->prepare('INSERT INTO utilisateurs (nom, prenom, pseudo, mail, mdp) VALUES (?, ?, ?, ?, ?)');

            // Exécution de la requête avec les valeurs fournies
            $result = $query->execute([$nom, $prenom, $pseudo, $mail, $hash]);
        }
    }
    return $result;
}

function authUtilisateur($mail, $password)
{

    $bdd = connectToBdd();
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
        if (verifierUtilisateur($mail)) {
            $user = getUtilisateur($mail);

            if (password_verify($password, $user["mdp"])) {
                return $user['mail'];
            } else {

                return -1;
            }
        }
    }
}

function getUtilisateur($mail)
{
    $bdd = connectToBdd();

    $query = $bdd->prepare("SELECT * FROM utilisateurs WHERE mail = ?");

    $query->execute([$mail]);

    $user = $query->fetchAll(PDO::FETCH_ASSOC);

    return $user[0];
}
