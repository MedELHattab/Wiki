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

public function createWiki($wikiData)
{
    try {
        // Insert data into the 'wikis' table
        $wikiInsertQuery = "INSERT INTO wikis (wiki_title, content, status, User_ID, Categorie_ID) VALUES (:wiki_title, :content, :status, :User_ID, :Categorie_ID)";
        $wikiStatement = $this->pdo->prepare($wikiInsertQuery);

        $wikiParams = [
            ':wiki_title' => $wikiData['wiki_title'],
            ':content' => $wikiData['content'],
            ':status' => $wikiData['status'],
            ':User_ID' => $wikiData['User_ID'],
            ':Categorie_ID' => $wikiData['Categorie_ID'],
        ];

        $wikiStatement->execute($wikiParams);

        // Get the last inserted ID
        $wikiId = $this->pdo->lastInsertId();

        // Insert data into the 'wiki-tag' table
        if (isset($_POST['tag']) && is_array($_POST['tag'])) {
            $tagInsertQuery = "INSERT INTO wiki-tag (wiki-id, tag-id) VALUES (:wiki_id, :tag_id)";
            $tagStatement = $this->pdo->prepare($tagInsertQuery);

            foreach ($_POST['tag'] as $tagId) {
                $tagParams = [
                    ':wiki_id' => $wikiId,
                    ':tag_id' => $tagId,
                ];
                $tagStatement->execute($tagParams);
            }
        }

        // Return a meaningful value, for example, the last inserted ID
        return $wikiId;
    } catch (PDOException $e) {
        echo "Error creating record: " . $e->getMessage();
        // You might want to throw an exception or return some error value here
        return false;
    }}


    public function deleteWiki($id)
    {
        $tableName = 'wikis';
        $this->delete($tableName, $id);
        header('Location: ../../wikis');
    }
    public function editwiki($data, $id)
    {
        $tableName = 'wikis';
        $redirect = URL_DIR . 'wikis';
        $this->update($tableName, $data, $id);
        header("Location: $redirect");
    }
}
