<?php

namespace App\Model;

use App\Model\Crud;
use PDO;
class Statistics extends Crud
{
    public function getTotalUsers()
    {
        return ['totalUsers' => $this->show_stats('user')];
    }

    public function getTotalTeams()
    {
        return ['totalTeams' => $this->show_stats('team')];
    }

    public function getTotalGames()
    {
        return ['totalMatches' => $this->show_stats('match')];
    }

    public function getSoldTicketsCount()
    {
        return ['soldTicketsCount' => $this->show_stats('ticket', 'WHERE status = "sold"')];
    }
    public function getCanceldTicket()
    {
        // return ['canTicketsCount' => $this->show_stats('ticket', 'WHERE status = "canceled"')];
        return ['canTicketsCount' => $this->show_stats('ticket', 'WHERE status = "canceled"')];
    }
    public function getCapacity($id)
    {
        $query="SELECT d.capacity FROM `match` m
        left JOIN stade d
        ON m.stade=d.id
        WHERE m.id = $id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }
    public function SoldTicketsMatch($id){
        $query="SELECT COUNT(*) as SoldTicketsMatch FROM ticket t
        WHERE t.match_id=$id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
