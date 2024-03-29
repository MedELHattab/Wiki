<?php

namespace App\Model;

use config\Connection;
use PDO;
use PDOException;

class Crud extends Connection
{
    public function __construct()
    {
        parent::__construct();
    }


    public function read($tableName)
    {
        try {
            $query = "SELECT * FROM $tableName";
            $stmt = $this->pdo->query($query);

            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $records; // Return the fetched records
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }


    public function create($tableName,$data)
    {
        try {
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));
            $query = "INSERT INTO `$tableName` ($columns) VALUES ($values)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($data);
            echo "Record added successfully!";
        } catch (PDOException $e) {
            echo "Error creating record: " . $e->getMessage();
        }
        
    }

    public function update($tableName, $data, $id)
    {
        try {
            $update_arr = [];
            foreach ($data as $column => $value) {
                $update_arr[] = "$column = :$column";
            }
            $update_arr = implode(", ", $update_arr);

            $query = "UPDATE `$tableName` SET $update_arr WHERE id = :id";
            $data['id'] = $id;

            $stmt = $this->pdo->prepare($query);
            $stmt->execute($data);

            echo "Record updated successfully!";
        } catch (PDOException $e) {
            echo "Error updating record: " . $e->getMessage();
        }
    }

    public function delete($tableName, $id)
    {
        try {
            $id+=0;
            $query = "DELETE FROM $tableName WHERE ID = :id";
          
            // Prepare and execute the SQL statement
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            
            // Output a success message
            echo "Record deleted successfully!";
        } catch (PDOException $e) {
            // Handle errors
            echo "Error deleting record: " . $e->getMessage();
        }
    }
    public function signuser($tableName, $data)
    {
        try {
            $columns = implode(", ", array_diff(array_keys($data), ['id']));
            $values = ":" . implode(", :", array_diff(array_keys($data), ['id']));
    
            $query = "INSERT INTO $tableName ($columns) VALUES ($values)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($data);
    
            echo "Record added successfully!";
        } catch (PDOException $e) {
            echo "Error creating record: " . $e->getMessage();
        }
    }

    public function getRecordById($tableName, $id)
    {
        $query = "SELECT *  FROM $tableName  WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function show_stats($table)
    {
        try {
            $query = "SELECT COUNT(*) AS count FROM `$table`";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return isset($result['count']) ? $result['count'] : 0;
        } catch (PDOException $e) {
            echo "Error fetching statistics: " . $e->getMessage();
            return 0; // Return 0 in case of an error
        }
    }
}

