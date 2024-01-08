<?php

namespace App\models;

use App\database\Database;
use PDO, PDOException;
use App\entities\User;

class UserModel
{
    private $database;

    public function __construct()
    {
        $this->database = Database::getInstance();
    }

    public function getDatabase()
    {
        return $this->database;
    }
    public function getAll()
    {
        $query = $this->database->getConnection()->query("SELECT users.*, roles.id as role_id, roles.name as role_name 
        FROM `users` 
        LEFT JOIN roles on roles.id=users.role_id  ");
        $userData = $query->fetchAll(PDO::FETCH_ASSOC);
        $users = array();

        if (empty($userData)) {
            return $users;
        } else {
            foreach ($userData as $userRow) {
                $users[] = new User(
                    $userRow['id'],
                    $userRow['name'],
                    $userRow['email'],
                    $userRow['password'],
                    $userRow['image'],
                    $userRow['description'],
                    $userRow['status'],
                    $userRow['role_id']
                );
            }
        }

        return $users;
    }

    public function save($user)
    {
        $hashedPassword= password_hash($user->getPassword() ,PASSWORD_DEFAULT);
        $statement = $this->getDatabase()->getConnection()->prepare("INSERT INTO `users` (username, email, password, image, description, status, role_id) 
    VALUES (:username, :email, :password, :image, :description, :status, :role_id)");

        $statement->bindValue(':username', $user->getName());
        $statement->bindValue(':email', $user->getEmail());
        $statement->bindValue(':password', $hashedPassword);
        $statement->bindValue(':image', $user->getImage());
        $statement->bindValue(':phone', $user->getDescription());
        $statement->bindValue(':rate', $user->getSatus());
        $statement->bindValue(':status', $user->getRoleId());
        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getUserByEmail($email)
    {
        $query = $this->database->getConnection()->prepare("SELECT * FROM `users` WHERE email = :email");
        $query->bindValue(':email', $email);

        try {
            $query->execute();
            $userData = $query->fetch(PDO::FETCH_ASSOC);

            if ($userData) {
                return new User(
                    $userData['id'],
                    $userData['name'],
                    $userData['email'],
                    $userData['password'],
                    $userData['image'],
                    $userData['description'],
                    $userData['status'],
                    $userData['role_id']
                );
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return null; 
    }
    public function getUserById($id){
        $query = $this->database->getConnection()->prepare("SELECT * FROM `users` WHERE id = :id");
        $query->bindValue(':id', $id);
    
        try {
            $query->execute();
            $userData = $query->fetch(PDO::FETCH_ASSOC);
    
            if ($userData) {
                return new User(
                    $userData['id'],
                    $userData['name'],
                    $userData['email'],
                    $userData['password'],
                    $userData['image'],
                    $userData['description'],
                    $userData['status'],
                    $userData['role_id']
                );
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    
        return null;
    }
    
    public function setUserStatus($id){
        $query = $this->database->getConnection()->prepare("UPDATE `users` SET `status`='Not Authorized' where id=:id");
        $query->bindValue(':id', $id);

    }



}

