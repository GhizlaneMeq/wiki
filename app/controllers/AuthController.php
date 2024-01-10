<?php

namespace App\controllers;

require __DIR__ . '/../../vendor/autoload.php';

use App\entities\User;
use App\models\UserModel;

class AuthController
{
    public function redirectToSignup()
    {
        if (isset($_SESSION["userId"])) {
            $userSId=$_SESSION["userId"];
                $user= new UserModel();
                $userData= $user->getUserById($userSId);
            }
            else {
               $userData=null ;
            }
    
        include '../../views/auth/register.php';
    }
    public function redirectToSignin()
    {
        if (isset($_SESSION["userId"])) {
            $userSId=$_SESSION["userId"];
                $user= new UserModel();
                $userData= $user->getUserById($userSId);
            }
            else {
               $userData=null ;
            }
    
            include '../../views/auth/login.php';

    }


    public function signup()
    {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['cpassword'];
        $role_id = 2;

        $userModel = new UserModel();
        $exist = $userModel->getUserByEmail($email);
        if ($exist) {
            $error = 'Username or email has already been taken';
            echo $error;
        } elseif ($password !== $confirmedPassword) {
            $error = 'Passwords do not match';
            echo $error;
        } else {
            $user = new User(null,$name, $email, $password, null, null, $status = 'authorized', $role_id);
            $userModel->save($user);
            header('location:login');
        }
    }

    public function signin()
    {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $userModel = new UserModel();
        $userData = $userModel->getUserByEmail($email);

        if ($userData) {
            if (password_verify($password, $userData->getPassword())) {
                $userModel->setUserStatus($email);
                switch ($userData->getRoleId()) {
                    case 1:
                        $_SESSION['isAdmin'] = true;
                        $_SESSION['userId'] = $userData->getId(); 
                         header('location:admin-dashboard'); 
                        echo 'admin';
                        break;
                    case 2:
                        $_SESSION['isAuthor'] = true;
                        $_SESSION['userId'] = $userData->getId(); 
                        header('location:home'); 
                        
                        break;
                   
                    
                }
            } else {
                echo 'incorrect Password';
            }
        } else {
            echo 'user doesnt exist';
        }
    }
    public function logout(){
        session_destroy();
        header("location: login");
        exit();
    
    }
}
