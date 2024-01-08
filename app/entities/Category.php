<?php

namespace App\entities;

class Category
{
    private $id;
    private $name;
    private $image;
    private $description;


    public function __construct($id,$name, $image, $description = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
    }


    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
}
