<?php
namespace App\controllers;
use App\models\UserModel;
use App\models\WikiModel;

class AdminDashController{
    public function index(){
        if (isset($_SESSION["userId"])) {
            $userSId = $_SESSION["userId"];
            $user = new UserModel();
            $userData = $user->getUserById($userSId);

        } else {
            $userData = null;
        }
        if ($_SESSION["isAdmin"]) {
            $wikiModel=new WikiModel();
        $wikis= $wikiModel->getAll();
        include '../../views/admin/dashboard.php';
        } else {
            header("location:login");
        }
        
    }


    public function wikiDetails(){
        if (isset($_SESSION["userId"])) {
            $userSId = $_SESSION["userId"];
            $user = new UserModel();
            $userData = $user->getUserById($userSId);

        } else {
            $userData = null;
        }
        $id=$_GET['id'];
        $wikiModel=new WikiModel();
        $wikiDetails= $wikiModel->getById($id);
        include '../../views/admin/wiki/details.php';
    }
    public function BlockUser(){
        $currentPage = $_POST['URL'];
        $id= $_POST['user'];
        $userModel = new UserModel();
        $userModel->setUserStatus($id,'Not Authorized');
        header("Location: $currentPage");
        exit();
    }

    public function AUthorizeUser(){
        $currentPage = $_POST['URL'];
        $id= $_POST['user'];
        $userModel = new UserModel();
        $userModel->setUserStatus($id,'Authorized');
        header("Location: $currentPage");
        exit();
    }



   public function dispalyAuthors(){
    if (isset($_SESSION["userId"])) {
        $userSId = $_SESSION["userId"];
        $userModel = new UserModel();
        $userData = $userModel->getUserById($userSId);

        $users=$userModel->getAll();
        include '../../views/admin/displayUser.php';

    } else {
        $userData = null;
    }

}


public function adminWikis(){

    if (isset($_SESSION["userId"])) {
        $userSId = $_SESSION["userId"];
        $user = new UserModel();
        $userData = $user->getUserById($userSId);

    } else {
        $userData = null;
    }
    if ($_SESSION["isAdmin"]) {
        $wikiModel=new WikiModel();
    $wikis= $wikiModel->getAll();
    include '../../views/admin/dashboard.php';
    } else {
        header("location:login");
    }

}















}





?>