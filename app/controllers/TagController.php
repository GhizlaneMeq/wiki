<?php

namespace App\controllers;

use App\entities\Tag;
use App\models\TagModel;
use App\models\UserModel;

class TagController
{
    public function index()
    {
        try {
            if ($_SESSION["isAdmin"]) {

            if (!isset($_SESSION["userId"])) {
                throw new \Exception("User not authenticated");
            }

            $userSId = $_SESSION["userId"];
            $user = new UserModel();
            $userData = $user->getUserById($userSId);

            if (!$userData) {
                throw new \Exception("User data not found");
            }

            $tagModel = new TagModel();
            $tags = $tagModel->getAll();
            include '../../views/admin/tag/add.php';
        } else {
            header("location:login");
        }
        } catch (\Exception $e) {
            header("Location: error-page?message=" . urlencode($e->getMessage()));
            exit();
        }
    }

    public function addTag()
    {
        try {
            if ($_SESSION["isAdmin"]) {

            if (!isset($_POST['newTag'])) {
                throw new \Exception("Invalid data. New tag not provided.");
            }

            $newTag = htmlspecialchars($_POST['newTag']);
            $tagModel = new TagModel();
            $tagModel->create($newTag);

            header("Location: tag?message=Tag added successfully");
            exit();
        } else {
            header("location:login");
        }
        } catch (\Exception $e) {
            header("Location: manage-tags?error=" . urlencode($e->getMessage()));
            exit();
        }
    }

    public function updateTag()
    {
        try {
            if ($_SESSION["isAdmin"]) {

            if (!isset($_SESSION["userId"])) {
                throw new \Exception("User not authenticated");
            }

            $userSId = $_SESSION["userId"];
            $user = new UserModel();
            $userData = $user->getUserById($userSId);

            if (!$userData) {
                throw new \Exception("User data not found");
            }

            $tagId = isset($_GET['id']) ? $_GET['id'] : null;

            if (!$tagId) {
                throw new \Exception("Invalid tag ID");
            }

            $tagModel = new TagModel();
            $tag = $tagModel->getById($tagId);

            if (!$tag) {
                throw new \Exception("Tag not found");
            }

            include '../../views/admin/tag/update.php';
        } else {
            header("location:login");
        }
        } catch (\Exception $e) {
            header("Location: error-page?message=" . urlencode($e->getMessage()));
            exit();
        }
    }

    public function submitUpdateTag()
    {
        try {
            if ($_SESSION["isAdmin"]) {

            if (!isset($_POST['id'], $_POST['label'])) {
                throw new \Exception("All required fields are not set.");
            }

            $id = $_POST['id'];
            $label = $_POST['label'];

            $tag = new Tag($id, $label);
            $tagModel = new TagModel();
            $tagModel->update($tag);

            header('location:tag?message=Tag updated successfully');
            exit();
        } else {
            header("location:login");
        }
        } catch (\Exception $e) {
            header("Location: tag?error=" . urlencode($e->getMessage()));
            exit();
        }
    }

    public function deleteTag()
    {
        try {
            if ($_SESSION["isAdmin"]) {

            $tagId = isset($_GET['id']) ? $_GET['id'] : null;

            if (!$tagId) {
                throw new \Exception("Invalid tag ID");
            }

            $tagModel = new TagModel();
            $tagModel->delete($tagId);

            header("Location: tag?message=Tag deleted successfully");
            exit();
        } else {
            header("location:login");
        }
        } catch (\Exception $e) {
            header("Location: tag?error=" . urlencode($e->getMessage()));
            exit();
        }
    }
}
