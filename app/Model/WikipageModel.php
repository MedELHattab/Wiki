<?php

namespace App\Model;

use PDO;
use PDOException;

class WikipageModel extends Crud
{
    public function readWiki($id)
    {
        $tablename = 'wikis';
        $data = $this->getRecordById($tablename, $id);
        return $data;
    }
    // public function WikiTags($id)
    // {
    //     try {
    //         $query = "SELECT  t.name 
    //                   FROM tags p
    //                   INNER JOIN wiki-tag p ON p.tag_id = t.id
    //                   WHERE p.wiki_id = :id";
    
    //         $stmt = $this->pdo->prepare($query);
    //         $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    //         $stmt->execute();
            
    //         $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //         return $tags;
    //     } catch (PDOException $e) {
    //         die("ERROR: Could not execute $query. " . $e->getMessage());
    //     }
    // }
}