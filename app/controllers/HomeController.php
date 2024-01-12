<?php

namespace App\controllers;

use App\models\CategoryModel;
use App\models\UserModel;
use App\models\WikiModel;

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
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['searchInput'])) {
            $searchQuery = $_POST['searchInput'];
            $WikiModel = new WikiModel();
            $searchedWikis = $WikiModel->searchWikis($searchQuery);

            var_dump($searchedWikis);

            return $searchedWikis;
        }

    }
}
?>