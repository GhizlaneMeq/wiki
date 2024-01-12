<?php

namespace App\controllers;

use App\models\CategoryModel;
use App\models\UserModel;
use App\models\WikiModel;
use Illuminate\Http\JsonResponse;
class HomeController
{

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['q'])) {
            $searchQuery = $_POST['q'];
            $WikiModel = new WikiModel();
            $searchedWikis = $WikiModel->searchWikis($searchQuery);

            include '../../views/index.php';
        } else {
            $WikiModel = new WikiModel();
            $wikis = $WikiModel->getAll();


            $categoryModel = new CategoryModel();
            $Recentcategories = $categoryModel->getRecentCategories();

            include '../../views/index.php';
        }
    }

    public function search()
{
    if (isset($_GET['q'])) {
        $searchQuery = $_GET['q'];
        $WikiModel = new WikiModel();
        $searchedWikis = $WikiModel->searchWikis($searchQuery);

        echo json_encode($searchedWikis);
       
    }
}

    
}


?>