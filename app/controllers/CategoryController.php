<?php

namespace App\controllers;

use App\entities\Category;
use App\models\CategoryModel;

class CategoryController
{
    public function index()
    {
        
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();

        include '../../views/admin/category/add.php';
    }

    public function addCategory()
    {
        if (isset($_POST['newCategory'])) {
            $newCategory = htmlspecialchars($_POST['newCategory']);
            $categoryModel = new CategoryModel();
            $categoryModel->create($newCategory);


            header("Location: category");
            exit();
        }


        header("Location: manage-categories?error=Invalid%20data");
        exit();
    }

    public function updateCategory()
    {
        $categoryId=$_GET['id'];
        $categoryModel = new CategoryModel();
       $category=$categoryModel->getById($categoryId) ;
       include '../../views/admin/category/update.php';
    }
    public function submitUpdateCategory(){
        $id= $_POST['id'];
        $name= $_POST['name'];
        $category= new Category($id,$name);
        $categoryModel= new CategoryModel();
        $categoryModel->update($category);
        header('location:category');
    }

    public function deleteCategory()
    {
        $categoryId=$_GET['id'];
        $categoryModel = new CategoryModel();
        $categoryModel->delete($categoryId);

        header("Location: category");
        exit();
    }
}
