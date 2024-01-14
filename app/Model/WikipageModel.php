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
    public function WikiTags($id)
    {
        try {
            $query = "SELECT p.tag_id, p.wiki_id, t.name 
                      FROM wiki_tag p
                      INNER JOIN tags t ON p.tag_id = t.id
                      WHERE p.wiki_id = :id";
    
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $tags;
        } catch (PDOException $e) {
            die("ERROR: Could not execute $query. " . $e->getMessage());
        }
    }
}