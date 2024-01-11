<?php
namespace App\controllers;

use App\models\CategoryModel;
use App\models\UserModel;
use App\models\WikiModel;

class HomeController
{

    public function index()
    {
        if (isset($_SESSION["userId"])) {
            $userSId = $_SESSION["userId"];
            $user = new UserModel();
            $userData = $user->getUserById($userSId);

        } else {
            $userData = null;
        }

        $categoryModel=new CategoryModel();

        $Recentcategories= $categoryModel->getRecentCategories();


        $WikiModel= new WikiModel();

        $wikis=$WikiModel->getAll();

        if (isset($_POST['searchInput'])) {
            $searchInput = $_POST['searchInput'];
        
            // Create an instance of WikiModel
              // Adjust the namespace accordingly
        
            // Use the searchWikis method to get the search results
            $wikis = $WikiModel->searchWikis($searchInput);
        
            // Convert the results to JSON and echo the response
            header('Content-Type: application/json');
            echo json_encode($wikis);
        } else {
            // Invalid request
            echo json_encode(['error' => 'Invalid search criteria.']);
        }
        include '../../views/index.php';

    }




}




?>