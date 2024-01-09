<?php

namespace App\Controller;

use App\Model\UserModel;

class UsersController
{
    public function index()
    {
        $users = new UserModel();
        $users = $users->readUser();
        include "../app/View/dashboard/users/users.php";
    }
    public function delete($id)
    {
        $users = new UserModel();
        $users->deleteUser($id);
    }

    
    public function editUser(){
        $users = new UserModel();
        $id = $_POST['id'];
        unset($_POST['id']);
        $users->editUser($_POST, $id);
    }
}
