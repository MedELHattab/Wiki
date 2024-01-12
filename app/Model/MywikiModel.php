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
