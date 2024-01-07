<?php

namespace App\Model;

class Stadium extends Crud
{
    public function createStadium($data)
    {
        return $this->create('stade', $data) !== false;
    }

    public function readStadium()
    {
        return $this->read('stade');
    }

    public function updateStadium($id, $data)
    {
        return $this->update('stade', $id, $data);
    }

    public function deleteStadium($id)
    {
        return $this->delete('stade', $id);
    }
}
