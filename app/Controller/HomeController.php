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
    public function liveSearch()
    {
        // var_dump($_POST);die;
        $obj = new HomeModel();
        $input = $_POST['query'];
        $result=$obj->search($input);
        
        echo json_encode($result);
    }
    
}
?>
