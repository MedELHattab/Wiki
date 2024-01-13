<?php

namespace App\Model;

use PDO;
use PDOException;

class WikipageModel extends Crud
{
    public function readWiki()
    {
        try {
            $query = "SELECT W.*, U.name, C.Categorie_Name
            FROM wikis W 
            INNER JOIN categories C ON W.Categorie_ID = C.id
            INNER JOIN users U ON U.id = W.User_ID";
            $stmt = $this->pdo->query($query);

            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $records; // Return the fetched records
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }}