<?php

namespace App\Controller;

use App\Model\Statistics;

class DashboardController {
    public function index() {
        if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
            // Redirect to sign-in page or perform other actions
            
            header("Location: ./signin");
            exit;
        }
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