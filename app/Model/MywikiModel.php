<?php

namespace App\Model;

use PDO;
use PDOException;


class MywikiModel extends Crud
{
    public function readMywiki()
{
    try {
        // Check if the session variable is set
        if (isset($_SESSION["id"])) {
            $query = "SELECT W.*, U.name, C.Categorie_Name
                      FROM wikis W 
                      INNER JOIN categories C ON W.Categorie_ID = C.id
                      INNER JOIN users U ON U.id = W.User_ID
                      WHERE W.User_ID = :loggedIn";

            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":loggedIn", $_SESSION["id"], PDO::PARAM_INT);
            $stmt->execute();

            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $records; // Return the fetched records
        } else {
            // Handle the case where the session variable is not set
            echo "User ID not set in the session.";
            return [];
        }
    } catch (PDOException $e) {
        echo "Error fetching records: " . $e->getMessage();
        return []; // Return an empty array in case of an error
    }
}


public function insert($table, $data)
    {
        try {
            // Utilize the data passed instead of an empty array
            parent::create($table, $data);
            return $wikiId = $this->pdo->lastInsertId();
            // Return the last inserted ID
        } catch (PDOException $e) {
            // Handle the error here if necessary (e.g., log the error)
            echo "Error during insertion: " . $e->getMessage();
            return false;
        }
    }

    public function getLastInsertId(){
        return $this->pdo->lastInsertId();
    }


    public function deleteWiki($id)
    {
        $tableName = 'wikis';
        $this->delete($tableName, $id);
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
    public function editwiki($data, $id)
    {
        $tableName = 'wikis';
        $redirect = URL_DIR . 'wikis';
        $this->update($tableName, $data, $id);
        header("Location: $redirect");
    }

    public function updateWikiTags($wiki_id, $dataToUpdate, $newTagIds)
{
    try {
        // Début de la transaction
        $this->pdo->beginTransaction();

        // Étape 1 : Mise à jour des données de l'article
        $updateQuery = "UPDATE wikis SET wiki_title = :wiki_title, content = :content, Categorie_ID = :Categorie_ID WHERE id = :id ";
        $updateStatement = $this->pdo->prepare($updateQuery);
        $updateStatement->bindParam(':id', $wiki_id);
        $updateStatement->bindParam(':wiki_title', $dataToUpdate['name']);
        $updateStatement->bindParam(':content', $dataToUpdate['content']);
        $updateStatement->bindParam(':Categorie_ID', $dataToUpdate['Categorie_ID']);
        $updateStatement->execute();

        // Étape 2 : Suppression des enregistrements liés à cet article dans la table pivot
        $deleteQuery = "DELETE FROM wiki_tag WHERE wiki_id = :wiki_id";
        $deleteStatement = $this->pdo->prepare($deleteQuery);
        $deleteStatement->bindParam(':article_id', $wiki_id);
        $deleteStatement->execute();

        // Étape 3 : Insertion des nouveaux enregistrements dans la table pivot
        $insertQuery = "INSERT INTO wiki_tag (wiki_id, tag_id) VALUES (:wiki_id, :tag_id)";
        $insertStatement = $this->pdo->prepare($insertQuery);
        $insertStatement->bindParam(':wiki_id', $wiki_id);

        // Lier :tag_id à l'intérieur de la boucle
        foreach ($newTagIds as $tagId) {
            $insertStatement->bindParam(':tag_id', $tagId);
            $insertStatement->execute();
        }

        // Validation de la transaction
        $this->pdo->commit();

        return true;
    } catch (PDOException $e) {
        // En cas d'erreur, annulez la transaction
        $this->pdo->rollBack();
        echo "Erreur lors de la mise à jour des tags et de l'article : " . $e->getMessage();
        return false;
    }
}
}
