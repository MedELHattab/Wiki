<?php

namespace App\Model;

use config\Connection;
use PDO;
use PDOException;

class HomeModel extends MatchModel
{
   public function fetchAllMatches()
   {
      return $this->fetchMatches();
   }
   public function search($input)
   {
      $query = "SELECT m.image,
      m.id,T1.name AS team1,T2.name AS team2,S.name as stadiumName,DATE(m.`time`) AS matchDay, T1.flag AS flag1, T2.flag AS flag2 
      FROM `match` m 
      INNER JOIN team T1 ON m.team1 = T1.id 
      INNER JOIN team T2 ON m.team2 = T2.id 
      INNER JOIN stade S ON m.stade = S.id
      where T1.name LIKE '%$input%' OR T2.name like '%$input%' OR S.name LIKE '%$input%';";
      $stmt = $this->pdo->query($query);
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $res;
   }
   public function searchByDate($start_date, $end_date)
   {
      $query = "SELECT m.image,
      m.id,T1.name AS team1,T2.name AS team2,S.name as stadiumName,DATE(m.`time`) AS matchDay, T1.flag AS flag1, T2.flag AS flag2 
      FROM `match` m 
      INNER JOIN team T1 ON m.team1 = T1.id 
      INNER JOIN team T2 ON m.team2 = T2.id 
      INNER JOIN stade S ON m.stade = S.id
      WHERE DATE(m.`time`) BETWEEN :start_date AND :end_date;";
      $stmt = $this->pdo->prepare($query);
      $stmt->bindParam(':start_date', $start_date);
      $stmt->bindParam(':end_date', $end_date);
      $stmt->execute();
      $matches = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $matches;
   }
}
