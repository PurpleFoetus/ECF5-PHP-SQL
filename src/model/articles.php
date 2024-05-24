<?php

require_once 'db.php';

function ajouterArticle($auteur, $contenu, $titre, $categorie)
{
    $date = date('Y-m-d');
    $bdd = connectToBdd();

    try {
        $sql = 'INSERT INTO articles (auteur, contenu, titre, date, catégorie) 
        VALUES (
            :auteur, 
            :contenu, 
            :titre, 
            :date, 
            (SELECT id FROM catégories WHERE nom = :categorie)
            )';
        $query = $bdd->prepare($sql);
        $query->bindParam(':auteur', $auteur, PDO::PARAM_INT);
        $query->bindParam(':contenu', $contenu, PDO::PARAM_STR);
        $query->bindParam(':titre', $titre, PDO::PARAM_STR);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->bindParam(':categorie', $categorie, PDO::PARAM_STR);
        $query->execute();
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}


function editerArticle($id, $titre, $contenu)
{
    $bdd = connectToBdd();

    try {
        $sql = 'UPDATE articles SET contenu = :contenu, titre = :titre WHERE id = :id';
        $query = $bdd->prepare($sql);
        $query->bindParam(':contenu', $contenu, PDO::PARAM_STR);
        $query->bindParam(':titre', $titre, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}

function supprimerArticle($id)
{
    $bdd = connectToBdd();

    try {
        $sql = 'DELETE FROM articles WHERE id = :id';
        $query = $bdd->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}

function getAllArticles()
{
    $bdd = connectToBdd();

    try {
        $sql = 'SELECT a.id, titre, contenu, auteur, pseudo, date, catégorie FROM articles a INNER JOIN utilisateurs u ON a.auteur = u.id';
        $query = $bdd->prepare($sql);
        $query->execute();
        $rowArticles= $query->fetchAll(PDO::FETCH_ASSOC);
        return $rowArticles;
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}

function getArticle($id)
{
    $bdd = connectToBdd();

    try {
        $sql = 'SELECT a.id, titre, contenu, auteur, pseudo, date, catégorie FROM articles a INNER JOIN utilisateurs u ON a.auteur = u.id WHERE a.id = :id';
        $query = $bdd->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $rowArticle = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rowArticle;
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}
