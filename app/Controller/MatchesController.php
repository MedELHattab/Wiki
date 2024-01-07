<?php

namespace app\Controller;

use App\Model\MatchModel;
use App\Model\Permission;
use App\Model\Statistics;

global $conn;
class MatchesController
{
    //get the View and fetching all data
    public function index()
    {
        $teamspage = new Permission();
        $role = $teamspage->check();
        // If the user is logged in and has the role of admin (role_id = 2)
        if ($role == 2) {
            $matche = new MatchModel;
            $objstatic = new Statistics;
            $matches = $matche->fetchMatches();
            $Teams = $matche->fetchTeams();
            $Stadiums = $matche->fetchStadiums();
            include '../app/View/dashboard/matches.php';
        } else {
            // Handle other cases, or simply redirect if necessary
            $redirect = URL_DIR . 'error404';
            header("Location: $redirect");
        }
    }


    public function addMatch()
    {
        // Create an instance of the TeamModel
        $matchobj = new MatchModel();

        $data = [];

        if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
            
            $flag = $_FILES['image'];
            $uploadDirectory = "C:/laragon/www/StadiumStream/public/assets/uploads/"; // Update this path to your local directory
            $filename = preg_replace("/[^a-zA-Z0-9]/", "_", $_POST['team1']) . "vs" .  preg_replace("/[^a-zA-Z0-9]/", "_", $_POST['team2']);
            $targetFileName = $uploadDirectory . $filename . "." . strtolower(pathinfo($flag['name'], PATHINFO_EXTENSION));

            if (move_uploaded_file($flag['tmp_name'], $targetFileName)) {
                $data['image'] = $filename . '.jpg';
            } else {
                echo 'File upload failed.';
                return;
            }
        }

        $data['team2'] = $_POST['team2'];
        $data['team1'] = $_POST['team1'];
        $data['time'] =  str_replace("T"," ",$_POST['time']). ":00";
        $data['stade'] = $_POST['stade'];
        $data['ticket_price'] = $_POST['ticket_price'];

        // var_dump($data['time']);die;
        $matchobj->addMatch('match', $data);
        header('Location: /StadiumStream/matches');
    }


    //delete match
    public function deleteMatch($id)
    {
        $match = new MatchModel;
        $match->deleteMatch("match", $id);
        header('Location: /StadiumStream/matches');
    }
    //update match
    public function updateMatch($id)
    {
        $matche = new MatchModel;
        $Teams = $matche->fetchTeams();
        $Stadiums = $matche->fetchStadiums();
        $selectedmatch = $matche->updateMatch("match", $id);
        // var_dump($selectedmatch);die;
        include '../app/View/dashboard/updateMatch.php';
    }
    public function submitUpdateMatch()
    {
        $match = new MatchModel();
        $id = $_POST['id'];
        unset($_POST['id']);
        $match->submitUpdateMatch("match", $_POST, $id);
        header('Location: /StadiumStream/matches');
    }


}
