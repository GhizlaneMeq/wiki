<?php


class Category {
    private $id;
    private $image;
    private $description;

    public function __construct($image, $description) {
        $this->image = $image;
        $this->description = $description;
    }

    public function getId() {
        return $this->id;
    }

    public function getImage() {
        return $this->image;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

}







?>