<?php
namespace App\entities;
class Wiki
{
    private $id;
    private $title;
    private $content;
    private $deletedAt;
    private $archived;
    private $dateCreation;
    private $userId;
    private $categoryId;

    public function __construct( $id, $title, $content, $deletedAt = null, $archived = false, $dateCreation = null, $userId, $categoryId
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        
        $this->deletedAt = $deletedAt;
        $this->archived = $archived;
        $this->dateCreation = $dateCreation;
        $this->userId = $userId;
        $this->categoryId = $categoryId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    

    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    public function isArchived()
    {
        return $this->archived;
    }

    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }

    public function setArchived($archived)
    {
        $this->archived = $archived;
    }

    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }
}
