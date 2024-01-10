<?php

namespace App\controllers;

use App\entities\User;
use App\models\UserModel;
use App\models\TagModel; // Add the TagModel
use App\models\CategoryModel; // Add the CategoryModel

class AuthorDashController
{

    public function dash()
    {
        if (isset($_SESSION["userId"])) {
            $userSId = $_SESSION["userId"];
            $user = new UserModel();
            $userData = $user->getUserById($userSId);
        } else {
            $userData = null;
        }
        include '../../views/auteur/dashboard.php';
    }

    public function addWiki()
    {
        if (isset($_SESSION["userId"])) {
            $userSId = $_SESSION["userId"];
            $user = new UserModel();
            $userData = $user->getUserById($userSId);
        } else {
            $userData = null;
        }

        
        $tagModel = new TagModel();
        $tags = $tagModel->getAll(); 

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll(); 

        include '../../views/auteur/addWiki.php';
    }

    public function updateProfile(){
        $userModel = new UserModel();
        $user= $userModel->getUserById($_SESSION['userId']);
        

   
        include '../../views/auteur/profile/dispaly.php';
    }

    public function submitUpdate(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $description = $_POST['description'];
        $id = $_POST['id'];

        $userModel = new UserModel();
        $existingUser = $userModel->getUserById($id);

        if (!$existingUser) {
            $error = "Invalid wiki ID";
            header("Location:");
            exit();
        }

        $newImage = $_FILES['image']['name'] ?? null;

        if (!empty($newImage)) {
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $fileExtension = pathinfo($newImage, PATHINFO_EXTENSION);
        
            if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                $temp_name = $_FILES['image']['tmp_name'];
                $folder = "/public/img/".$newImage;
                move_uploaded_file($temp_name, __DIR__.'/../../'.$folder);
            } else {
               
                $error = "Invalid file type. Allowed types: jpg, jpeg, png, gif";
                header("Location: /error-page.php?message=" . urlencode($error));
                exit();
            }
        } else {
            $folder = $existingUser->getImage();
        }


        $userModel= new UserModel();
        $user= new User($id, $name, $email, $password, $folder, $description, null,null);

        $userModel->updateUser($user);
        header("location:my-profile");

    }

}

?>