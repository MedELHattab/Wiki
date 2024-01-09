<?php

namespace App\Model;

use App\Model\Crud;

class Statistics extends Crud
{
    public function getTotalUsers()
    {
        return ['totalUsers' => $this->show_stats('users')];
    }

    public function getTotalCategories()
    {
        return ['totalCategories' => $this->show_stats('categories')];
    }

    public function getTotalWikis()
    {
        return ['totalWikis' => $this->show_stats('wikis')];
    }
    public function getTotalTags()
    {
        return ['totalTags' => $this->show_stats('tags')];
    }
}
