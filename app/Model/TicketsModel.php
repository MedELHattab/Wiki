<?php

namespace App\Model;

use PDO;
use PDOException;

class TicketsModel extends Crud {
    public function displaytickets(){
        return $this->read('ticket');
    }
    public function cancel_ticket($id){
        $tablename = 'ticket'; 
        $redirect = URL_DIR . 'tickets';
        try {
            $query = "UPDATE $tablename SET status = 'canceled' WHERE id = :id";

            // Prepare and execute the SQL statement
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            // Output a success message
            // echo "Updated successfully!";
            header("Location: $redirect");
        } catch (PDOException $e) {
            // Handle errors
            echo "Error updating record: " . $e->getMessage();
        }
    }
}