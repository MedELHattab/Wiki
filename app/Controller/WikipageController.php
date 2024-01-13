<?php

namespace App\Controller;

use App\Model\WikipageModel;

class WikipageController
{
    public function index()
    {
        $wikiModel = new WikipageModel();
        $wikis = $wikiModel->readWiki();
        include "../app/View/Wikipage.php";
    }
}