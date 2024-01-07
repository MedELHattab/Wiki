<?php

namespace App\Model;

use PDO;
use PDOException;

class UserModel extends Crud
{
    public function displayusers()
    {
        return $this->read('user');
    }

    public function createUser($userData)
    {
        try {
            //insert data into user table
            $userCreated = $this->create('user', $userData) !== false;
            if ($userCreated) {
                //retrieve the userID
                $userID = $this->pdo->lastInsertId();
                //insert data into user_role table
                $userRoleData = [
                    'user_id' => $userID,
                    'role_id' => 1
                ];
                $userRoleCreated = $this->create('user_role', $userRoleData) !== false;
                return $userRoleCreated;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "PDO Exception: " . $e->getMessage();
            return false;
        }
    }

    public function signin($email)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
            exit();
        }
    }
    public function getUserById($userId)
    {
        return $this->getRecordById('user', $userId);
    }
    public function updateUser($userId, $userData)
    {
        return $this->update('user', $userData, $userId) !== false;
    }
}
