<?php

namespace App\models;

use App\database\Database;
use PDO, PDOException;
use App\entities\Wiki;

class WikiModel
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
        $query = $this->database->getConnection()->query("SELECT * FROM `wikis`");
        $wikiData = $query->fetchAll(PDO::FETCH_ASSOC);
        $wikis = array();

        if (empty($wikiData)) {
            return $wikis;
        } else {
            foreach ($wikiData as $wikiRow) {
                $wikis[] = new Wiki(
                    $wikiRow['id'],
                    $wikiRow['title'],
                    $wikiRow['content'],
                    $wikiRow['deleted_at'],
                    $wikiRow['archived'],
                    $wikiRow['date_creation'],
                    $wikiRow['user_id'],
                    $wikiRow['category_id']
                );
            }
        }

        return $wikis;
    }

    public function getById($id)
    {
        $query = $this->database->getConnection()->prepare("SELECT * FROM `wikis` WHERE id = :id");
        $query->bindValue(':id', $id);

        try {
            $query->execute();
            $wikiData = $query->fetch(PDO::FETCH_ASSOC);

            if ($wikiData) {
                return new Wiki(
                    $wikiData['id'],
                    $wikiData['title'],
                    $wikiData['content'],
                    $wikiData['deleted_at'],
                    $wikiData['archived'],
                    $wikiData['date_creation'],
                    $wikiData['user_id'],
                    $wikiData['category_id']
                );
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return null;
    }

    public function create($wiki)
    {
        $statement = $this->getDatabase()->getConnection()->prepare("INSERT INTO `wikis` (title, content, user_id, category_id) 
            VALUES (:title, :content, :user_id, :category_id)");

        $statement->bindValue(':title', $wiki->getTitle());
        $statement->bindValue(':content', $wiki->getContent());
        $statement->bindValue(':user_id', $wiki->getUserId());
        $statement->bindValue(':category_id', $wiki->getCategoryId());

        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function update($wiki)
    {
        $statement = $this->getDatabase()->getConnection()->prepare("UPDATE `wikis` 
            SET title = :title, content = :content, user_id = :user_id, category_id = :category_id 
            WHERE id = :id");

        $statement->bindValue(':id', $wiki->getId());
        $statement->bindValue(':title', $wiki->getTitle());
        $statement->bindValue(':content', $wiki->getContent());
        $statement->bindValue(':user_id', $wiki->getUserId());
        $statement->bindValue(':category_id', $wiki->getCategoryId());

        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function delete($id)
    {
        $query = $this->database->getConnection()->prepare("DELETE FROM `wikis` WHERE id = :id");
        $query->bindValue(':id', $id);

        try {
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
