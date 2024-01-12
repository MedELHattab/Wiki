<?php

namespace App\Controller;

use App\Model\MywikiModel;

class MywikisController
{
    public function index()
    {
        // Retrieve the logged-in user's ID
        $loggedIn = $_SESSION['id'];

        // Create an instance of MywikiModel
        $wikiModel = new MywikiModel();

        // Fetch wikis belonging to the logged-in user
        $wikis = $wikiModel->readMywiki();

        // Include the view
        include "../app/View/mywikis.php";
    }
    public function delete($id)
    {
        $wikis = new MywikiModel();
        $wikis->deleteWiki($id);
    }
}
