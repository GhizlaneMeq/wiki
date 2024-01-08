<?php

class Tag {
    private $id;
    private $label;
    private $image;

    public function __construct($label, $image) {
        $this->label = $label;
        $this->image = $image;
    }

    public function getId() {
        return $this->id;
    }

    // Getter for Label
    public function getLabel() {
        return $this->label;
    }

    // Getter for Image
    public function getImage() {
        return $this->image;
    }

    // Setter for ID
    public function setId($id) {
        $this->id = $id;
    }

    // Setter for Label
    public function setLabel($label) {
        $this->label = $label;
    }

    // Setter for Image
    public function setImage($image) {
        $this->image = $image;
    }

    // Additional methods as needed...
}




?>