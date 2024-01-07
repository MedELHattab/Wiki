<?php

namespace App\Model;

use PDO;
use PDOException;

class TeamModel extends Crud
{
    public function readTeams()
    {
        return $this->read('team');
    }
    public function addTeam($data)
    {
        $tableName = 'team';

        $this->create($tableName, $data);
    }
    public function deleteTeam($id)
    {
        $tableName = 'team';
        $this->delete($tableName, $id);
        header('Location: ../../teams');
    }
    public function editTeam($data, $id)
    {
        $tableName = 'team';
        $redirect = URL_DIR . 'teams';
        $this->update($tableName, $data, $id);
        header("Location: $redirect");
    }
}
