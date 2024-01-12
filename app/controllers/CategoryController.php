<?php

namespace App\controllers;

use App\entities\Category;
use App\models\CategoryModel;
use App\models\UserModel;

class CategoryController
{
    public function index()
    {
        try {
            if ($_SESSION["isAdmin"]) {


                if (!isset($_SESSION["userId"])) {
                    throw new \Exception("User not authenticated");
                }

                $userSId = $_SESSION["userId"];
                $user = new UserModel();
                $userData = $user->getUserById($userSId);

                $categoryModel = new CategoryModel();
                $categories = $categoryModel->getAll();

                include '../../views/admin/category/add.php';
            } else {
                header("location:login");
            }
        } catch (\Exception $e) {
            header("Location: manage-categories?error=" . urlencode($e->getMessage()));
            exit();
        }

    }

    public function addCategory()
    {
        try {
            if ($_SESSION["isAdmin"]) {


                if (!isset($_POST['newCategory'])) {
                    throw new \Exception("Invalid data");
                }

                $newCategory = htmlspecialchars($_POST['newCategory']);
                $category = new Category(null, $newCategory, null, null);

                $categoryModel = new CategoryModel();
                $categoryModel->create($category);

                header("Location: category?message=Category%20added%20successfully");
                exit();
            } else {
                header("location:login");
            }
        } catch (\Exception $e) {
            header("Location: manage-categories?error=" . urlencode($e->getMessage()));
            exit();
        }

    }

    public function updateCategory()
    {
        try {
            if ($_SESSION["isAdmin"]) {
                if (!isset($_SESSION["userId"])) {
                    throw new \Exception("User not authenticated");
                }

                $userSId = $_SESSION["userId"];
                $user = new UserModel();
                $userData = $user->getUserById($userSId);

                $categoryId = $_GET['id'];
                $categoryModel = new CategoryModel();
                $category = $categoryModel->getById($categoryId);

                include '../../views/admin/category/update.php';
            } else {
                header("location:login");
            }
        } catch (\Exception $e) {
            header("Location: manage-categories?error=" . urlencode($e->getMessage()));
            exit();
        }
    }

    public function submitUpdateCategory()
    {
        try {
            if ($_SESSION["isAdmin"]) {

                if (!isset($_POST['id'], $_POST['name'])) {
                    throw new \Exception("Invalid data");
                }

                $id = $_POST['id'];
                $name = $_POST['name'];
                $category = new Category($id, $name, null, null);

                $categoryModel = new CategoryModel();
                $categoryModel->update($category);

                header('location:category?message=Category%20updated%20successfully');
                exit();
            } else {
                header("location:login");
            }
        } catch (\Exception $e) {
            header("Location: manage-categories?error=" . urlencode($e->getMessage()));
            exit();
        }
    }

    public function delete()
    {
        try {
            if ($_SESSION["isAdmin"]) {

                if (!isset($_GET['id'])) {
                    throw new \Exception("Invalid data");
                }

                $categoryId = $_GET['id'];
                $categoryModel = new CategoryModel();
                $categoryModel->delete($categoryId);

                header("Location: category?message=Category%20deleted%20successfully");
                exit();
            } else {
                header("location:login");
            }
        } catch (\Exception $e) {
            header("Location: manage-categories?error=" . urlencode($e->getMessage()));
            exit();
        }
    }
}
