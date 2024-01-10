<?php
namespace App\controllers;
use App\models\UserModel;
use App\models\WikiModel;

class AdminDashController{
    public function index(){
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