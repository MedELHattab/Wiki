<?php

namespace App\Controller;

use App\Model\Permission;

class AddStadiumController
{
    public function index()
    {
        $Addpage = new Permission();
        $role = $Addpage->check();
        // If the user is logged in and has the role of admin (role_id = 2)
        if ($role == 2) {
            include "../app/View/dashboard/AddStadium.php";
        } else {
            // Handle other cases, or simply redirect if necessary
            $redirect = URL_DIR . 'signin';
            header("Location: $redirect");
        }
    }
}
