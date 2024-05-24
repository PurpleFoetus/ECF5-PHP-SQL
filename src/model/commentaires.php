<?php
    require_once 'db.php';
    
    function ajouterCommentaire($auteur, $contenu, $article){
        $date = date('Y-m-d');
        $bdd= connectToBdd();

        try{
            $sql = 'INSERT INTO commentaires (auteur, contenu, date, article)
                VALUES (:auteur, :contenu, :date, :article)';
            $query = $bdd->prepare($sql);
            $query->bindParam(':auteur', $auteur, PDO::PARAM_INT);
            $query->bindParam(':contenu', $contenu, PDO::PARAM_STR);
            $query->bindParam(':date', $date , PDO::PARAM_STR);
            $query->bindParam(':article', $article, PDO::PARAM_INT);
            $query->execute();
        }catch(PDOException $e){
            //arrete le programme en cas d'erreur et affiche un message d'erreur
            die("Erreur :" . $e->getMessage());
        }
        
    }

    function recupererCommentairesArticle($article){
        $bdd= connectToBdd();
        $sql = 'SELECT c.id, pseudo, contenu, date FROM commentaires c INNER JOIN utilisateurs u ON c.auteur = u.id WHERE article = :article';
        $query = $bdd->prepare($sql);
        $query->bindParam(':article', $article, PDO::PARAM_INT);
        $query->execute();
        $listCommentaires = $query->fetchAll(PDO::FETCH_ASSOC);
        return $listCommentaires;
    }
?>