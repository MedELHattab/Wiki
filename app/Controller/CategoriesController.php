<?php

namespace App\Controller;

use App\Model\CategorieModel;

class CategoriesController
{
    public function index()
    {
        $categories = new CategorieModel();
        $categories = $categories->readCategorie();
        include "../app/View/dashboard/categories/categories.php";
    }
    public function delete($id)
    {
        $categories = new CategorieModel();
        $categories->deleteCategorie($id);
    }

    
    public function editCategorie(){
        $categories = new CategorieModel();
        $id = $_POST['id'];
        unset($_POST['id']);
        $categories->editCategorie($_POST, $id);
    }
}
