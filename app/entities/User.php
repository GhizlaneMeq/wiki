<?php
class User {
    private $id;
    private $name;
    private $email;
    private $password;
    private $image;
    private $description;
    private $status;
    private $roleId;

    public function __construct($name, $email, $password, $image = null, $description = null, $status = 'authorized', $roleId) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->image = $image;
        $this->description = $description;
        $this->status = $status;
        $this->roleId = $roleId;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getImage() {
        return $this->image;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getRoleId() {
        return $this->roleId;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setRoleId($roleId) {
        $this->roleId = $roleId;
    }
}

?>