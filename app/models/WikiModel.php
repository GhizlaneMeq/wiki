<?php

namespace App\models;

use App\database\Database;
use PDO, PDOException, Exception;
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
        try {
            $query = $this->database->getConnection()->query("SELECT wikis.*, users.name AS user_name, categories.name AS category_name, GROUP_CONCAT(tags.label) AS tag_labels
            FROM `wikis`
            LEFT JOIN `users` ON wikis.user_id = users.id
            LEFT JOIN `categories` ON wikis.category_id = categories.id
            LEFT JOIN `wikis_tags` ON wikis.id = wikis_tags.wiki_id
            LEFT JOIN `tags` ON wikis_tags.tag_id = tags.id
            GROUP BY wikis.id");

            $wikiData = $query->fetchAll(PDO::FETCH_ASSOC);
            $wikis = array();

            foreach ($wikiData as $wikiRow) {
                $wikis[] = new Wiki(
                    $wikiRow['id'],
                    $wikiRow['title'],
                    $wikiRow['content'],
                    $wikiRow['image'],
                    $wikiRow['deleted_at'],
                    $wikiRow['archived'],
                    $wikiRow['date_creation'],
                    $wikiRow['user_name'],
                    $wikiRow['category_name'],
                    explode(',', $wikiRow['tag_labels'])
                );
            }

            return $wikis;
        } catch (PDOException $e) {
            throw new Exception("Error fetching wikis: " . $e->getMessage());
        }
    }

    public function getWikisByUser($userId)
    {
        try {
            $query = $this->database->getConnection()->prepare("SELECT wikis.*, users.name  AS user_name, categories.name AS category_name, GROUP_CONCAT(tags.label) AS tag_labels
            FROM `wikis`
            LEFT JOIN `users` ON wikis.user_id = users.id
            LEFT JOIN `categories` ON wikis.category_id = categories.id
            LEFT JOIN `wikis_tags` ON wikis.id = wikis_tags.wiki_id
            LEFT JOIN `tags` ON wikis_tags.tag_id = tags.id
            WHERE wikis.user_id = :user_id AND wikis.archived= false
            GROUP BY wikis.id");

            $query->bindValue(':user_id', $userId);
            $query->execute();

            $wikiData = $query->fetchAll(PDO::FETCH_ASSOC);
            $wikis = array();

            foreach ($wikiData as $wikiRow) {
                $wikis[] = new Wiki(
                    $wikiRow['id'],
                    $wikiRow['title'],
                    $wikiRow['content'],
                    $wikiRow['image'],
                    $wikiRow['deleted_at'],
                    $wikiRow['archived'],
                    $wikiRow['date_creation'],
                    $wikiRow['user_name'],
                    $wikiRow['category_name'],
                    explode(',', $wikiRow['tag_labels'])
                );
            }

            return $wikis;
        } catch (PDOException $e) {
            throw new Exception("Error fetching wikis by user ID: " . $e->getMessage());
        }
    }

    public function getWikisByUserName($username)
    {
        try {
            $query = $this->database->getConnection()->prepare("SELECT wikis.*, users.name  AS user_name, categories.name AS category_name, GROUP_CONCAT(tags.label) AS tag_labels
            FROM `wikis`
            LEFT JOIN `users` ON wikis.user_id = users.id
            LEFT JOIN `categories` ON wikis.category_id = categories.id
            LEFT JOIN `wikis_tags` ON wikis.id = wikis_tags.wiki_id
            LEFT JOIN `tags` ON wikis_tags.tag_id = tags.id
            WHERE users.name = :user_name AND wikis.archived= false
            GROUP BY wikis.id LIMIT 2");

            $query->bindValue(':user_name', $username);
            $query->execute();

            $wikiData = $query->fetchAll(PDO::FETCH_ASSOC);
            $wikis = array();

            foreach ($wikiData as $wikiRow) {
                $wikis[] = new Wiki(
                    $wikiRow['id'],
                    $wikiRow['title'],
                    $wikiRow['content'],
                    $wikiRow['image'],
                    $wikiRow['deleted_at'],
                    $wikiRow['archived'],
                    $wikiRow['date_creation'],
                    $wikiRow['user_name'],
                    $wikiRow['category_name'],
                    explode(',', $wikiRow['tag_labels'])
                );
            }

            return $wikis;
        } catch (PDOException $e) {
            throw new Exception("Error fetching wikis by user ID: " . $e->getMessage());
        }
    }


    public function getById($id)
    {
        try {
            $query = $this->database->getConnection()->prepare("SELECT wikis.*, users.name AS user_name, categories.name AS category_name, GROUP_CONCAT(tags.label) AS tag_labels
                FROM `wikis`
                LEFT JOIN `users` ON wikis.user_id = users.id
                LEFT JOIN `categories` ON wikis.category_id = categories.id
                LEFT JOIN `wikis_tags` ON wikis.id = wikis_tags.wiki_id
                LEFT JOIN `tags` ON wikis_tags.tag_id = tags.id
                WHERE wikis.id = :id
                GROUP BY wikis.id");

            $query->bindValue(':id', $id);
            $query->execute();

            $wikiData = $query->fetch(PDO::FETCH_ASSOC);

            if ($wikiData) {
                return new Wiki(
                    $wikiData['id'],
                    $wikiData['title'],
                    $wikiData['content'],
                    $wikiData['image'],
                    $wikiData['deleted_at'],
                    $wikiData['archived'],
                    $wikiData['date_creation'],
                    $wikiData['user_name'],
                    $wikiData['category_name'],
                    explode(',', $wikiData['tag_labels'])
                );
            }
        } catch (PDOException $e) {
            throw new Exception("Error fetching wiki by ID: " . $e->getMessage());
        }

        return null;
    }

    public function create($wiki)
    {
        try {
            $statement = $this->getDatabase()->getConnection()->prepare("INSERT INTO `wikis`(`title`, `content`, `image`, `user_id`, `category_id`)
                VALUES (:title, :content, :image, :user_id, :category_id)");

            $statement->bindValue(':title', $wiki->getTitle());
            $statement->bindValue(':content', $wiki->getContent());
            $statement->bindValue(':image', $wiki->getImage());
            $statement->bindValue(':user_id', $wiki->getUserId());
            $statement->bindValue(':category_id', $wiki->getCategoryId());

            $statement->execute();

            return $this->getDatabase()->getConnection()->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Error creating wiki: " . $e->getMessage());
        }
    }

    public function addTag($wikiId, $tagId)
    {
        try {
            $statement = $this->getDatabase()->getConnection()->prepare("INSERT INTO `wikis_tags`(`wiki_id`, `tag_id`) VALUES (:wiki_id, :tag_id)");
            $statement->bindValue(':wiki_id', $wikiId);
            $statement->bindValue(':tag_id', $tagId);
            $statement->execute();
        } catch (PDOException $e) {
            throw new Exception("Error associating tag with wiki: " . $e->getMessage());
        }
    }

    public function update($wiki)
    {
        $statement = $this->getDatabase()->getConnection()->prepare("UPDATE `wikis` 
            SET title = :title, content = :content, image = :image, category_id = :category_id 
            WHERE id = :id");

        $statement->bindValue(':id', $wiki->getId());
        $statement->bindValue(':title', $wiki->getTitle());
        $statement->bindValue(':content', $wiki->getContent());
        $statement->bindValue(':image', $wiki->getImage());
        $statement->bindValue(':category_id', $wiki->getCategoryId());

        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $query = $this->database->getConnection()->prepare("DELETE FROM `wikis` WHERE id = :id");
            $query->bindValue(':id', $id);

            $query->execute();
        } catch (PDOException $e) {
            throw new Exception("Error deleting wiki: " . $e->getMessage());
        }
    }

    public function archive($wikiId)
    {
        $statement = $this->getDatabase()->getConnection()->prepare("UPDATE `wikis` SET archived = 1 WHERE id = :id");
        $statement->bindValue(':id', $wikiId);

        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function disarchive($wikiId)
    {
        $statement = $this->getDatabase()->getConnection()->prepare("UPDATE `wikis` SET archived = 0 WHERE id = :id");
        $statement->bindValue(':id', $wikiId);

        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getWikiCount()
    {
        $query = "SELECT COUNT(*) as count FROM wikis";
        $result = $this->database->getConnection()->query($query);
        return $result->fetch(PDO::FETCH_ASSOC)['count'];
    }

    public function searchWikis($searchInput)
    {
        $searchInput = "%$searchInput%"; 

        $sql = "SELECT DISTINCT w.*, u.name AS author, c.name AS category
                FROM wikis w
                LEFT JOIN users u ON w.user_id = u.id
                LEFT JOIN categories c ON w.category_id = c.id
                LEFT JOIN wikis_tags wt ON w.id = wt.wiki_id
                LEFT JOIN tags t ON wt.tag_id = t.id
                WHERE w.title LIKE :searchInput
                OR w.content LIKE :searchInput
                OR u.name LIKE :searchInput
                OR c.name LIKE :searchInput
                OR t.label LIKE :searchInput";

        $stmt = $this->database->getConnection()->prepare($sql);
        $stmt->bindParam(':searchInput', $searchInput, PDO::PARAM_STR);
        $stmt->execute();

        $wikiData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $wikis = array();

        foreach ($wikiData as $wikiRow) {
            $wikis[] = new Wiki(
                $wikiRow['id'],
                $wikiRow['title'],
                $wikiRow['content'],
                $wikiRow['image'],
                $wikiRow['deleted_at'],
                $wikiRow['archived'],
                $wikiRow['date_creation'],
                $wikiRow['user_name'],
                $wikiRow['category_name'],
                explode(',', $wikiRow['tag_labels'])
            );
        }

        return $wikis;
    }
}
