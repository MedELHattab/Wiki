<?php
namespace App\Model;
session_start();

use PDO;
use PDOException;

class Permission extends Crud
{
    public function check()
    {
        $redirect = URL_DIR . 'signin';
        if (isset($_SESSION['id'])) {
            try {
                // Step 1: Query the user_role table for the role_id associated with the user
                $stmt = $this->pdo->prepare("SELECT * FROM user_role WHERE user_id = :id");
                $stmt->bindParam(':id', $_SESSION['id'], PDO::PARAM_STR);
                $stmt->execute();
                $userRole = $stmt->fetch(PDO::FETCH_ASSOC);
                // var_dump($userRole);
                $role = $userRole['role_id'];
                return $role;
            } catch (PDOException $e) {
                echo 'Database Error: ' . $e->getMessage();
                exit();
            }
        } else {
            // Redirect if the user is not logged in
            header("Location: $redirect");
        }
    }
}
