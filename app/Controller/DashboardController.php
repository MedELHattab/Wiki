<?php

namespace App\Controller;

use App\Model\Statistics;

class DashboardController {
    public function index() {
        $statistics = new Statistics();

        $totalUsersData = $statistics->getTotalUsers();
        $totalCategoriesData = $statistics->getTotalCategories();
        $totalWikisData = $statistics->getTotalWikis();
        $totalTagsData = $statistics->getTotalTags();
       
        $totalUsers = $totalUsersData['totalUsers'];
        $totalCategories = $totalCategoriesData['totalCategories'];
        $totalWikis = $totalWikisData['totalWikis'];
        $totalTags = $totalTagsData['totalTags'];
        // Pass the data to the view
        include "../app/View/dashboard/main.php";
    }
}
?>