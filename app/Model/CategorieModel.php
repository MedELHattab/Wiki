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
    public function editCategorie($data, $id)
    {
        $tableName = 'categories';
        $redirect = URL_DIR . 'categories';
        $this->update($tableName, $data, $id);
        header("Location: $redirect");
    }
}
