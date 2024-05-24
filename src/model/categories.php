<?php
require_once 'db.php';

function recupererCategories(){
    $bdd = connectToBdd();
    $sql = 'SELECT * FROM catégories';
    $query = $bdd->prepare($sql);
    $query->execute();
    $listCategories = $query->fetchAll(PDO::FETCH_ASSOC);
    return $listCategories;
}

function recupererCategorie($id){
    $bdd = connectToBdd();
    $sql = 'SELECT nom FROM catégories WHERE id = :id';
    $query = $bdd->prepare($sql);
    $query->bindParam(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $categorie = $query->fetchAll(PDO::FETCH_ASSOC);
    return $categorie;
}