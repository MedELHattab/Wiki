<?php

namespace App\Controller;

use App\Model\HomeModel;

class HomeController
{
    public function index()
    {
        $obj = new HomeModel();
        $matches = $obj->fetchAllMatches();
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
    public function searchByDateRange()
    {
        // var_dump($_POST);die;
        $obj = new HomeModel();
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $result=$obj->searchByDate($start_date,$end_date);
        
        echo json_encode($result);
    }
}
