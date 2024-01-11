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
        ;
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
        $userModel=new UserModel();
        $userModel->setUserStatus(3);
    }
}





?>