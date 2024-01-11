<?php

namespace App\models;

use App\database\Database;
use PDO;
use PDOException;
use App\entities\Category;
use Exception;

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
                    $categoryRow['description'],
                    $categoryRow['date_creation']
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
                    $categoryData['description'],
                    $categoryData['date_creation']
                );
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return null;
    }

    public function create($category)
    {
        $statement = $this->getDatabase()->getConnection()->prepare("INSERT INTO `categories`(`name`,`description`, `date_creation`) VALUESVALUES (:name, :description, :date_creation)");
        $statement->bindValue(':name', $category->getName());
        $statement->bindValue(':description', $category->getDescription());
        $statement->bindValue(':date_creation', $category->getDateCreation());

        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function update($category)
    {
        $statement = $this->getDatabase()->getConnection()->prepare("UPDATE `categories` SET name = :name WHERE id = :id");
        $statement->bindValue(':id', $category->getId());
        $statement->bindValue(':name', $category->getName());

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


    public function getRecentCategories($limit = 6)
    {
        try {
            $query = $this->database->getConnection()->query("SELECT * FROM `categories` ORDER BY `date_creation` DESC LIMIT $limit");

            $categoriesData = $query->fetchAll(PDO::FETCH_ASSOC);
            $categories = array();

            foreach ($categoriesData as $categoryData) {
                $categories[] = new Category(
                    $categoryData['id'],
                    $categoryData['name'],
                    $categoryData['description'],
                    $categoryData['date_creation']
                );
            }

            return $categories;
        } catch (PDOException $e) {
            throw new Exception("Error fetching recent categories: " . $e->getMessage());
        }
    }
}
