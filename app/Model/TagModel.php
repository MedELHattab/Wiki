<?php

namespace App\Model;

use PDO;
use PDOException;

class TagModel extends Crud
{
    public function readTags()
    {
        try {
            $query = "SELECT * FROM tags";
            $stmt = $this->pdo->query($query);

            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $records; // Return the fetched records
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }
    public function deleteTags($id)
    {
        $tableName = 'tags';
        $this->delete($tableName, $id);
        header('Location: ../../tags');
    }
    public function editTag($data,$categoryId){
        $tablename = 'tags';
        return $this->update($tablename,$data, $categoryId);
    }
 
    public function createTag($data)
    {
        $tableName = 'tags';
        try {
            $this->signuser($tableName, $data);
            return true;
        } catch (PDOException $e) {
        }
    }
}

