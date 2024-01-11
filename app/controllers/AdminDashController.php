<?php
namespace App\controllers;

use App\models\CategoryModel;
use App\models\TagModel;
use App\models\UserModel;
use App\models\WikiModel;

class AdminDashController
{
    public function index()
    {
        if ($_SESSION["isAdmin"]) {
            if (isset($_SESSION["userId"])) {
                $userSId = $_SESSION["userId"];
                $user = new UserModel();
                $userData = $user->getUserById($userSId);

            } else {
                $userData = null;
            }
            $wikiModel = new WikiModel();
            $tagModel = new TagModel();
            $CategoryModel = new CategoryModel();
            $userModel = new UserModel();

            $wikis = $wikiModel->getWikiCount();
            $tags = $tagModel->getTagCount();
            $categories = $CategoryModel->getCategoryCount();
            $users = $userModel->getUserCount();
            $authorizedYsers = $userModel->getAuthorizedUserCount();
            $notAuthorizedUsers = $userModel->getNonAuthorizedUserCount();
            include '../../views/admin/dashboard.php';
        } else {
            header("location:login");
        }

    }


    public function wikiDetails()
    {
        if (isset($_SESSION["userId"])) {
            $userSId = $_SESSION["userId"];
            $user = new UserModel();
            $userData = $user->getUserById($userSId);

        } else {
            $userData = null;
        }
        $id = $_GET['id'];
        $wikiModel = new WikiModel();
        $wikiDetails = $wikiModel->getById($id);
        include '../../views/admin/wiki/details.php';
    }
    public function BlockUser()
    {
        $currentPage = $_POST['URL'];
        $id = $_POST['user'];
        $userModel = new UserModel();
        $userModel->setUserStatus($id, 'Not Authorized');
        header("Location: $currentPage");
        exit();
    }

    public function AUthorizeUser()
    {
        $currentPage = $_POST['URL'];
        $id = $_POST['user'];
        $userModel = new UserModel();
        $userModel->setUserStatus($id, 'Authorized');
        header("Location: $currentPage");
        exit();
    }



    public function dispalyAuthors()
    {
        if (isset($_SESSION["userId"])) {
            $userSId = $_SESSION["userId"];
            $userModel = new UserModel();
            $userData = $userModel->getUserById($userSId);

            $users = $userModel->getAll();
            include '../../views/admin/displayUser.php';

        } else {
            $userData = null;
        }

    }


    public function adminWikis()
    {

        if (isset($_SESSION["userId"])) {
            $userSId = $_SESSION["userId"];
            $user = new UserModel();
            $userData = $user->getUserById($userSId);

        } else {
            $userData = null;
        }

        if ($_SESSION["isAdmin"]) {
            $wikiModel = new WikiModel();
            $wikis = $wikiModel->getAll();
            include '../../views/admin/wiki/display.php';
        } else {
            header("location:login");
        }

    }


    public function search()
    {
        
        if (isset($_SESSION["userId"])) {
            $userSId = $_SESSION["userId"];
            $user = new UserModel();
            $userData = $user->getUserById($userSId);

        } else {
            $userData = null;
        }
        $query = isset($_GET['query']) ? $_GET['query'] : '';
        $wikiModel = new WikiModel();
        $tagModel = new TagModel();
        $categoryModel = new CategoryModel();
        $userModel = new UserModel();
    
        $users = $userModel->searchUsers($query);
        $wikis = $wikiModel->searchWikis($query);
        $tags = $tagModel->searchTags($query);
        $categories = $categoryModel->searchCategories($query);
    
        // Now, you can include a view that will display the search results in a modal
         foreach ($users as $user):
           echo $user->getName();
         endforeach;

         foreach ($wikis as $wiki):
           echo $wiki->getTitle();
         endforeach;

         foreach ($tags as $tag):
           echo $tag->getLabel();
         endforeach;

         foreach ($categories as $category):
           echo $category->getName();
         endforeach; 
    }
    















}





?>