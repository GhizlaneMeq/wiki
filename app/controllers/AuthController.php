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
    try {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role_id = 2;

        $userModel = new UserModel();
        $exist = $userModel->getUserByEmail($email);

        if ($exist) {
            throw new \Exception('Username or email has already been taken');
        } else {
            $user = new User(null, $name, $email, $password, null, null, 'authorized', $role_id);
            $userModel->save($user);
            header('location:login');
            exit(); 
        }
    } catch (\Exception $e) {
        
        header('location:register?error=' . urlencode($e->getMessage()));
        exit();
    }
}


public function signin()
{
    try {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userModel = new UserModel();
        $userData = $userModel->getUserByEmail($email);

        if ($userData) {
            if (password_verify($password, $userData->getPassword())) {
                switch ($userData->getRoleId()) {
                    case 1:
                        $_SESSION['isAdmin'] = true;
                        $_SESSION['userId'] = $userData->getId();
                        header('location:admin-dashboard');
                        break;
                    case 2:
                        $_SESSION['isAuthor'] = true;
                        $_SESSION['userId'] = $userData->getId();
                        header('location:home');
                        break;
                }
            } else {
                throw new \Exception('Incorrect Password');
            }
        } else {
            throw new \Exception('User doesn\'t exist');
        }
    } catch (\Exception $e) {
        
        header('location:login?error=' . urlencode($e->getMessage()));
        exit();
    }
}
public function logout()
    {
        session_destroy();
        header('location: login?message=' . urlencode('You have been successfully logged out.'));
        exit();
    }
    
}
