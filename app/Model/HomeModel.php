<?php

namespace App\Model;



use PDOException;
use PDO;

class HomeModel extends Crud
{



    public function getwikis()
    {

        try {
            $query = "SELECT w.id, w.wiki_title , u.name, c.Categorie_Name ,w.content FROM wikis w  inner JOIN users u on u.id = w.User_ID  inner JOIN categories c where w.Categorie_ID  = c.id and w.status ='approved' limit 3";
            $stmt = $this->pdo->query($query);

            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $records; // Return the fetched records
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }

    public function getSportwikis()
    {

        try {
            $query = "SELECT w.id, w.wiki_title, c.Categorie_Name, w.content
            FROM wikis w
            INNER JOIN categories c ON w.Categorie_ID = c.id
            WHERE c.Categorie_Name = 'Sport'
            and w.status ='approved'
            LIMIT 3;
            ";
            $stmt = $this->pdo->query($query);

            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $records; // Return the fetched records
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }

    public function search($input)
    {
        try {
            $query = " SELECT w.id, w.wiki_title, w.content, w.status, u.name, c.Categorie_Name FROM `wikis` w
            INNER JOIN users u ON w.User_ID = u.id 
            INNER JOIN categories c ON w.Categorie_ID = c.id
            WHERE w.status = 'approved' AND w.wiki_title LIKE '%$input%'";
            $stmt = $this->pdo->query($query);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return [];
        }
    }

}
