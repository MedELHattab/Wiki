<?php

namespace App\Controller;

use App\Model\Permission;
use App\Model\Statistics;

class DashboardController
{
    public function index()
    {
        $dashboard = new Permission();
        $role = $dashboard->check();
        $statisticsModel = new Statistics();

        $totalUsersData = $statisticsModel->getTotalUsers();
        $totalTeamsData = $statisticsModel->getTotalTeams();
        $totalGamesData = $statisticsModel->getTotalGames();
        $soldTicketsCountData = $statisticsModel->getSoldTicketsCount();
        $getCapacity = $statisticsModel->getCanceldTicket();
        // var_dump($getCapacity);die;
        $totalUsers = $totalUsersData['totalUsers'];
        $totalTeams = $totalTeamsData['totalTeams'];
        $totalMatches = $totalGamesData['totalMatches'];
        $soldTicketsCount = $soldTicketsCountData['soldTicketsCount'];
        $canTicketsCount = $getCapacity['canTicketsCount'];

        // If the user is logged in and has the role of admin (role_id = 2)
        if ($role == 2) {
            include "../app/View/dashboard/dashboard.php";
        } else {
            // if the user is not an admin 
            $redirect = URL_DIR . 'error404';
            header("Location: $redirect");
        }
    }
}
