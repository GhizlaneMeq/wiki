<?php

namespace App\models;

use App\database\Database;
use PDO;
use PDOException;
use App\entities\Tag;
use Exception;

class TagModel
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
        $query = $this->database->getConnection()->query("SELECT * FROM `tags`");
        $tagData = $query->fetchAll(PDO::FETCH_ASSOC);
        $tags = array();

        if (empty($tagData)) {
            return $tags;
        } else {
            foreach ($tagData as $tagRow) {
                $tags[] = new Tag(
                    $tagRow['id'],
                    $tagRow['label']
                );
            }
        }

        return $tags;
    }

    public function getById($id)
    {
        $query = $this->database->getConnection()->prepare("SELECT * FROM `tags` WHERE id = :id");
        $query->bindValue(':id', $id);

        try {
            $query->execute();
            $tagData = $query->fetch(PDO::FETCH_ASSOC);

            if ($tagData) {
                return new Tag(
                    $tagData['id'],
                    $tagData['label']
                );
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return null;
    }

    public function create($label)
    {
        $statement = $this->getDatabase()->getConnection()->prepare("INSERT INTO `tags`(`label`) VALUES (:label)");
        $statement->bindValue(':label', $label);

        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function update($tag)
    {
        $statement = $this->getDatabase()->getConnection()->prepare("UPDATE `tags` SET label = :label WHERE id = :id");
        $statement->bindValue(':id', $tag->getId());
        $statement->bindValue(':label', $tag->getLabel());

        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function delete($id)
    {
        $query = $this->database->getConnection()->prepare("DELETE FROM `tags` WHERE id = :id");
        $query->bindValue(':id', $id);

        try {
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function getTagCount()
    {
        $query = "SELECT COUNT(*) as count FROM tags";
        $result = $this->database->getConnection()->query($query);
        return $result->fetch(PDO::FETCH_ASSOC)['count'];
    }

    public function searchTags($query)
    {
        try {
            $statement = $this->database->getConnection()->prepare("SELECT * FROM tags WHERE label LIKE :query");
            $statement->bindValue(':query', "%$query%");
            $statement->execute();

            $tagData = $statement->fetchAll(PDO::FETCH_ASSOC);
            $tags = array();

            if (empty($tagData)) {
                return $tags;
            } else {
                foreach ($tagData as $tagRow) {
                    $tags[] = new Tag(
                        $tagRow['id'],
                        $tagRow['label']
                    );
                }
            }

            return $tags;
        } catch (PDOException $e) {
            throw new Exception("Error searching for tags: " . $e->getMessage());
        }
    }
}
