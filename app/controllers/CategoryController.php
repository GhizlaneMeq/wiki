<?php

namespace App\controllers;

use App\entities\Category;
use App\models\CategoryModel;
use App\models\UserModel;

class CategoryController
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
        
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();

        include '../../views/admin/category/add.php';
    }

    public function addCategory()
    {
        if (isset($_POST['newCategory'])) {
            $newCategory = htmlspecialchars($_POST['newCategory']);
            $category =new Category(null,$newCategory,null,null);
            $categoryModel = new CategoryModel();
            $categoryModel->create($category);


            header("Location: category");
            exit();
        }


        header("Location: manage-categories?error=Invalid%20data");
        exit();
    }

    public function updateCategory()
    {

        if (isset($_SESSION["userId"])) {
            $userSId = $_SESSION["userId"];
            $user = new UserModel();
            $userData = $user->getUserById($userSId);

        } else {
            $userData = null;
        }
        
        $categoryId=$_GET['id'];
        $categoryModel = new CategoryModel();
       $category=$categoryModel->getById($categoryId) ;
       include '../../views/admin/category/update.php';
    }
    public function submitUpdateCategory(){
        $id= $_POST['id'];
        $name= $_POST['name'];
        $category= new Category($id,$name,null,null);
        $categoryModel= new CategoryModel();
        $categoryModel->update($category);
        header('location:category');
    }

    public function delete()
    {
        $categoryId=$_GET['id'];
        $categoryModel = new CategoryModel();
        $categoryModel->delete($categoryId);

        header("Location: category");
        exit();
    }
}
