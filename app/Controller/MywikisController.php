<?php

namespace App\Controller;

use App\Model\CategorieModel;
use App\Model\TagModel;
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
        $categories = new CategorieModel();
        $categories = $categories->readCategorie();
        $tags = new TagModel();
        $tags = $tags->readTags();
        // Include the view
        include "../app/View/mywikis.php";

    }
    public function addWiki()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Retrieve form data
            $wiki = htmlspecialchars($_POST["wiki"]);
            $content = htmlspecialchars($_POST["content"]);
            $status = 'pending';
            $User_ID = $_SESSION["id"];
            $Categorie_ID = isset($_POST["categorie"]) ? (int)$_POST["categorie"] : null;

            // Create an instance of WikiModel
            $wikiModel = new MywikiModel();

            // Data to be inserted into the 'wikis' table
            $wikiData = [
                'wiki_title' => $wiki,
                'content' => $content,
                'status' => $status,
                'User_ID' => $User_ID,
                'Categorie_ID' => $Categorie_ID
            ];

            $wikiCreated = $wikiModel->insert('wikis', $wikiData);

            if ($wikiCreated) {
                    $lastInsertedWiki = $wikiModel->getLastInsertId();
                   
                    // Tags du formulaire
                    $tagsInput = isset($_POST['tag']) ? $_POST['tag'] : [];
                    $tagModel = new MywikiModel();

                    foreach ($tagsInput as $tag) {

                        $tagModel->insert('wiki_tag', ['tag_id' => $tag, 'wiki_id' => $lastInsertedWiki]);

                    }

                    echo "Data inserted successfully.";
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                // Redirect to the signin page with an error parameter if there was an issue
                header("Location: ./signin?error=1");
                exit();
            }
        }
    }
   
    public function delete($id)
    {
        $wikis = new MywikiModel();
        $wikis->deleteWiki($id);
    }

    public function updateWiki()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $name = $_POST['wiki'];
        $content = $_POST['content'];

        $Categorie_ID = $_POST['Categorie_ID'];
        var_dump($name);
        
        $dataToUpdate = [
            'wiki_title' => $name,
            'content' => $content,
            'Categorie_ID' => $Categorie_ID,
        ];

        $wikiModel = new MywikiModel();
        var_dump($dataToUpdate);

        $tags = isset($_POST['tag']) ? $_POST['tag'] : [];
        $updateSuccess = $wikiModel->updateWikiTags($id, $dataToUpdate, $tags);
        header('Location: ' . $_SERVER['HTTP_REFERER']);


    } 
}
}
