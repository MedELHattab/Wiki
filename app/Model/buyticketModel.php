<?php

namespace App\Model;

use config\Connection;
use PDO;
use PDOException;

class buyticketModel extends Connection
{
    public function fetchSingleMatche($id)
    {
        try {
            $query = "SELECT m.image,
            m.id,T1.name AS team1,T2.name AS team2,S.name as stadiumName,DATE(m.time) AS matchDay, T1.flag AS flag1, T2.flag AS flag2, m.ticket_price AS price , T.uu_id AS uu_id, T.reservation_date AS T_date FROM `match` m 
             INNER JOIN team T1 ON m.team1 = T1.id 
             INNER JOIN team T2 ON m.team2 = T2.id 
             INNER JOIN stade S ON m.stade = S.id
             left JOIN ticket T ON m.id = T.match_id
             where m.id=$id;";
            $stmt = $this->pdo->query($query);
            $records = $stmt->fetch(PDO::FETCH_ASSOC);

            return $records;
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return [];
        }
    }
    public function reserveTicket($id,$userid,$uu_id,$price){
        try {
            $query = "INSERT INTO `ticket`(`match_id`, `user_id`, `uu_id`,`price`) VALUES ($id,$userid,'$uu_id',$price)";
            $stmt = $this->pdo->query($query);
            $records = $stmt->fetch(PDO::FETCH_ASSOC);

            return $records;
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return [];
        }
    }
}