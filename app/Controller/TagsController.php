<?php

namespace App\Controller;

use App\Model\TagModel;

class TagsController
{
    public function index()
    {
        $tags = new TagModel();
        $tags = $tags->readTags();
        include "../app/View/dashboard/tags/tags.php";
    }
    public function delete($id)
    {
        $tags = new TagModel();
        $tags->deleteTags($id);
    }
    public function addTag(){
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Retrieve form data
            $tag = htmlspecialchars($_POST["tag"]);
         
            // Create an instance of SignupModel
            $tagModel = new TagModel();

            // Data to be inserted into the 'users' table
            $tagData = [
                
                'tag' => $tag,
            ];

            // Call the createUser method in SignupModel to insert the user into the database
            $tagCreated = $tagModel->createTag($tagData);

            if ($tagCreated) {
                header('Location: '. $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                // Redirect to the signin page with an error parameter if there was an issue
                header("Location: ./signin?error=1");
                exit();
            }
        } 
    }

    
    public function editTag(){
        $redirect = URL_DIR . 'tags';
        $CategoriesModel = new TagModel();
        // var_dump($_POST);die;
        $id = $_POST['id'];
        $data = $_POST['tag'];
        $name = [
            'tag' => $data,
        ];
        $CategoriesModel->editTag($name, $id);
        header("Location: $redirect");
    }
}
