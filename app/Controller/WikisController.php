<?php

namespace App\Controller;

use App\Model\WikiModel;

class WikisController
{
    public function index()
    {
        $wikis = new WikiModel();
        $wikis = $wikis->readWiki();
        include "../app/View/dashboard/wikis/wikis.php";
    }
    public function delete($id)
    {
        $wikis = new WikiModel();
        $wikis->deleteWiki($id);
    }

    
    public function editUser(){
        $wikis = new WikiModel();
        $id = $_POST['id'];
        unset($_POST['id']);
        $wikis->editWiki($_POST, $id);
    }
}
