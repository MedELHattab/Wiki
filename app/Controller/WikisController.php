<?php

namespace App\Controller;

use App\Model\WikiModel;

class WikisController
{
    public function index()
    {
        $wikis = new WikiModel();
        $wikis = $wikis->readWiki();
        include "../app/View/dashboard/wikis/wikis.php";
    }
    public function delete($id)
    {
        $wikis = new WikiModel();
        $wikis->deleteWiki($id);
    }

    
    public function editUser(){
        $wikis = new WikiModel();
        $id = $_POST['id'];
        unset($_POST['id']);
        $wikis->editWiki($_POST, $id);
    }

    public function updateState()
    {
        

        $wikiModel = new WikiModel();

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the values from the form
            $wikiId = $_POST['id'];
            $selectedState = $_POST['status'];

            $updateSuccess = $wikiModel->updateWikiState($wikiId, $selectedState);
            if ($updateSuccess) {
                header('Location: '. $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                echo "Error updating wiki status.";
            }

        }
    }
}
