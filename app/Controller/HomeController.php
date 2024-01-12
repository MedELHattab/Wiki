<?php

namespace App\Controller;

use App\Model\HomeModel;

class HomeController {
    public function index() {
        $wikis = new HomeModel();
        $allWikis = $wikis->getwikis();     
        $allSportWikis = $wikis->getSportwikis();
        include '../app/View/home.php';
    }
}
?>
