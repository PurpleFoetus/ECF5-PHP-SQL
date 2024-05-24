<?php

if (!isset($_POST['username'], $_POST['password'])) {
    exit("Veuillez saisir un mot de passe et un nom d'utilisateur");
}


function checkUser($pseudo, $password)
{
    $bdd = connectToBdd();

    try {
        $sql = 'SELECT * FROM utilisateurs WHERE pseudo = :pseudo';
        $query = $bdd->prepare($sql);
        $query->bindParam(':pseudo', $pseudo);
        $query->execute();
        
        if($query->rowCount() > 0){
            $query->fetch();

            if(password_verify($password, $password)){

            }
        }

    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}
