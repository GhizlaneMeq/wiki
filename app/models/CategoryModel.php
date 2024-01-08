<?php

namespace App\models;

use App\database\Database;
use PDO, PDOException;
use App\entities\Category;

class CategoryModel
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
        $query = $this->database->getConnection()->query("SELECT * FROM `categories`");
        $categoryData = $query->fetchAll(PDO::FETCH_ASSOC);
        $categories = array();

        if (empty($categoryData)) {
            return $categories;
        } else {
            foreach ($categoryData as $categoryRow) {
                $categories[] = new Category(
                    $categoryRow['id'],
                    $categoryRow['name'],
                    $categoryRow['image'],
                    $categoryRow['description']
                );
            }
        }

        return $categories;
    }

    public function getById($id)
    {
        $query = $this->database->getConnection()->prepare("SELECT * FROM `categories` WHERE id = :id");
        $query->bindValue(':id', $id);

        try {
            $query->execute();
            $categoryData = $query->fetch(PDO::FETCH_ASSOC);

            if ($categoryData) {
                return new Category(
                    $categoryData['id'],
                    $categoryData['name'],
                    $categoryData['image'],
                    $categoryData['description']
                );
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return null;
    }

    public function create($category)
    {
        $statement = $this->getDatabase()->getConnection()->prepare("INSERT INTO `categories` (name, image, description) 
            VALUES (:name, :image, :description)");

        $statement->bindValue(':name', $category->getName());
        $statement->bindValue(':image', $category->getImage());
        $statement->bindValue(':description', $category->getDescription());

        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function update($category)
    {
        $statement = $this->getDatabase()->getConnection()->prepare("UPDATE `categories` 
            SET name = :name, image = :image, description = :description 
            WHERE id = :id");

        $statement->bindValue(':id', $category->getId());
        $statement->bindValue(':name', $category->getName());
        $statement->bindValue(':image', $category->getImage());
        $statement->bindValue(':description', $category->getDescription());

        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function delete($id)
    {
        $query = $this->database->getConnection()->prepare("DELETE FROM `categories` WHERE id = :id");
        $query->bindValue(':id', $id);

        try {
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
