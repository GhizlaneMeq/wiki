<?php

namespace App\entities;

class Wiki
{
    private $id;
    private $title;
    private $content;
    private $image;
    private $deleted_at;
    private $archived;
    private $date_creation;
    private $user_id;
    private $category_id;

    private $tags; 
    public function __construct(
        $id,
        $title,
        $content,
        $image,
        $deleted_at,
        $archived,
        $date_creation,
        $user_id,
        $category_id,
        $tags = []
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->image = $image;
        $this->deleted_at = $deleted_at;
        $this->archived = $archived;
        $this->date_creation = $date_creation;
        $this->user_id = $user_id;
        $this->category_id = $category_id;

        $this->tags = $tags;
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

    public function getImage()
    {
        return $this->image;
    }

    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    public function isArchived()
    {
        return $this->archived;
    }

    public function getDateCreation()
    {
        return $this->date_creation;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }
    public function getTags()
    {
        return $this->tags;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;
    }

    public function setArchived($archived)
    {
        $this->archived = $archived;
    }

    public function setDateCreation($dateCreation)
    {
        $this->date_creation = $dateCreation;
    }

    public function setUserId($userId)
    {
        $this->user_id = $userId;
    }

    public function setCategoryId($categoryId)
    {
        $this->category_id = $categoryId;
    }
    public function setTags($tags)
    {
        $this->tags = $tags;
    }
}
