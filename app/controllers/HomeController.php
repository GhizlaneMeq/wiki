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

        if (isset($_SESSION["userId"])) {
            $userSId = $_SESSION["userId"];
            $user = new UserModel();
            $userData = $user->getUserById($userSId);

        } else {
            $userData = null;
        }
        $WikiModel = new WikiModel();
        $wikis = $WikiModel->getAll();


        $categoryModel = new CategoryModel();
        $Recentcategories = $categoryModel->getRecentCategories();

        include '../../views/index.php';

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