<?php

namespace App\Model;

use PDO;
use PDOException;

class CategorieModel extends Crud
{
    public function readCategorie()
    {
        try {
            $query = "SELECT * FROM categories";
            $stmt = $this->pdo->query($query);

            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $records; // Return the fetched records
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }
    public function deleteCategorie($id)
    {
        $tableName = 'categories';
        $this->delete($tableName, $id);
        header('Location: ../../categories');
    }
    public function editCategory($data,$categoryId){
        $tablename = 'categories';
        return $this->update($tablename,$data, $categoryId);
    }

    public function createCategorie($data)
    {
        $tableName = 'categories';
        try {
            $this->create($tableName, $data);
            return true;
        } catch (PDOException $e) {
        }
    }
}
