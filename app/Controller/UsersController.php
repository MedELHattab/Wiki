<?php

namespace App\Controller;

use App\Model\Permission;
use App\Model\UserModel;

class UsersController
{
    public function index()
    {
        $Userspage = new Permission();
        $Userspage->check('team');
        $users = new UserModel();
        $users = $users->displayusers();
        include "../app/View/dashboard/users.php";

    }
}

