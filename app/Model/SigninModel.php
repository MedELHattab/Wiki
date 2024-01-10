<?php

namespace App\Model;

use PDOException;

class SigninModel extends Crud
{
    public function authenticateUser($email, $password)
    {
        try {
            $tableName = "users";
            $query = "SELECT * FROM $tableName WHERE email = :email";

            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":email", $email, \PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($user) {
                // Verify hashed password
                if (password_verify($password, $user['password'])) {
                    // Authentication successful

                    // Check user role
                    if ($user['role'] == 'admin') {
                        // Admin should go to the dashboard
                        echo "Admin authenticated successfully!";
                        return $user;
                    } else {
                        // Other users should go to the home
                        echo "User authenticated successfully!";
                        return $user;
                    }
                } else {
                    // Authentication failed
                    echo "Invalid email or password.";
                    return null;
                }
            } else {
                // Authentication failed
                echo "Invalid email or password.";
                return null;
            }
        } catch (PDOException $e) {
            echo "Error authenticating user: " . $e->getMessage();
            return null;
        }
    }
}
