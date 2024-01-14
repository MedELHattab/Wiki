<?php

namespace App\Controller;

use App\Model\WikipageModel;

class WikipageController
{
    public function index()
    {
        $id = $_POST['id'];
        // var_dump($_POST);  // Check if the id is being correctly retrieved


        $wikis = new WikipageModel();
        $wiki = $wikis->readWiki($id);
        // $tags = $wikis->WikiTags($id);
        // $viewData =[
        //     'wiki' => $wiki,
        //     'tags' => $tags,
        // ];
        include "../app/View/Wikipage.php";
    }
}