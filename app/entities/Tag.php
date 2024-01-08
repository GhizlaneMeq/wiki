<?php

namespace App\entities;

class Tag
{
    private $id;
    private $label;
    private $image;

    public function __construct($label, $image)
    {
        $this->label = $label;
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }


    public function getLabel()
    {
        return $this->label;
    }


    public function getImage()
    {
        return $this->image;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function setLabel($label)
    {
        $this->label = $label;
    }


    public function setImage($image)
    {
        $this->image = $image;
    }
}
