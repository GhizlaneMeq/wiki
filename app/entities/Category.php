<?php

namespace App\entities;

class Category
{
    private $id;
    private $name;
    private $description;
    private $date_creation;

    public function __construct($id, $name,$description, $date_creation)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description= $description;
        $this->date_creation = $date_creation;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function getDateCreation()
    {
        return $this->date_creation;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;
    }
}
