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

    
    public function editTags(){
        $tags = new TagModel();
        $id = $_POST['id'];
        unset($_POST['id']);
        $tags->editTag($_POST, $id);
    }
}
