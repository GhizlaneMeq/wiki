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

        include '../../views/index.php';

    }




}




?>