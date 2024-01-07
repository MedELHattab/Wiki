<?php

namespace App\Model;

use config\Connection;
use PDO;
use PDOException;

class MatchModel extends Crud
{
    public function fetchMatches()
    {
        // return $this->read('match');

        try {
            $query = "	SELECT m.image,
            m.id,T1.name AS team1,T2.name AS team2,S.name as stadiumName,DATE(m.`time`) AS matchDay FROM `match` m 
             INNER JOIN team T1 ON m.team1 = T1.id 
             INNER JOIN team T2 ON m.team2 = T2.id 
             INNER JOIN stade S ON m.stade = S.id;";
            $stmt = $this->pdo->query($query);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $records;
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return [];
        }
    }
    public function fetchTeams()
    {
        return $this->read('team');
    }
    public function fetchStadiums()
    {
        return $this->read('stade');
    }

    public function addMatch($tabel, $data)
    {
        
        return $this->create($tabel, $data);
    }

    public function deleteMatch($tabel, $id)
    {

        return $this->delete($tabel, $id);
    }
    public function updateMatch($tabelname, $id)
    {
        try {
            $query = "SELECT * FROM `$tabelname` where id=$id";         
            $stmt = $this->pdo->query($query);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $records; 
        } catch (PDOException $e) {
            echo "Error fetching records: " . $e->getMessage();
            return []; 
        }
    }
    public function submitUpdateMatch($table,$data,$id){
        return $this->update($table,$data,$id);
    }
}
