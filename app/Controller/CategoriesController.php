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

    public function addCategorie(){
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Retrieve form data
            $categorie = htmlspecialchars($_POST["categorie"]);
         
            // Create an instance of SignupModel
            $categorieModel = new CategorieModel();

            // Data to be inserted into the 'users' table
            $categorieData = [
                
                'Categorie_Name' => $categorie,
            ];

            // Call the createUser method in SignupModel to insert the user into the database
            $categorieCreated = $categorieModel->createCategorie($categorieData);

            if ($categorieCreated) {
                header('Location: '. $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                // Redirect to the signin page with an error parameter if there was an issue
                header("Location: ./signin?error=1");
                exit();
            }
        } 
    }
    
    public function editCategorie(){
        $redirect = URL_DIR . 'categories';
        $CategoriesModel = new CategorieModel();
        // var_dump($_POST);die;
        $id = $_POST['id'];
        $data = $_POST['categorie'];
        $name = [
            'Categorie_Name' => $data,
        ];
        $CategoriesModel->editCategory($name, $id);
        header("Location: $redirect");
    }
}
