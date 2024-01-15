<?php

namespace App\Model;

use PDO;
use PDOException;

class WikipageModel extends Crud
{
    // public function readWiki($id)
    // {
    //     $tablename = 'wikis';
    //     $data = $this->getRecordById($tablename, $id);
    //     return $data;
    // }
    public function Wikiinfo($id)
    {
        try {
            $query = "SELECT wikis.id ,users.name   , wikis.wiki_title ,wikis.status , wikis.content ,categories.Categorie_Name  FROM wikis 
              INNER JOIN users INNER JOIN categories ON users.id = wikis.User_ID
               and categories.id = wikis.Categorie_ID WHERE wikis.id = :id";
    
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute(); 
            $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $tags;
        } catch (PDOException $e) {
            die("ERROR: Could not execute $query. " . $e->getMessage());
        }
    }

    public function tagsWiki($id)
    {
        try {
            $sql= "SELECT tags.id , tags.tag FROM tags INNER JOIN wiki_tag INNER JOIN wikis on wikis.id = wiki_tag.wiki_id and wiki_tag.tag_id = tags.id WHERE wikis.id = :id  ;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute(); 
            $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $tags;
        } catch (PDOException $e) {
            die("ERROR: Could not execute $sql. " . $e->getMessage());
        }
    }

}



       