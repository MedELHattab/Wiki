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
        $wiki = $wikis->Wikiinfo($id);
        $wiki= $wiki[0];
        $tags = $wikis->tagsWiki($id);
        include "../app/View/Wikipage.php";
    }
}