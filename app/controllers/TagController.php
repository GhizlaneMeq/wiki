<?php

namespace App\controllers;

use App\entities\Tag;
use App\models\TagModel;

class TagController
{
    public function index()
    {
        $tagModel = new TagModel();
        $tags = $tagModel->getAll();

        include '../../views/admin/tag/add.php';
    }

    public function addTag()
    {
        if (isset($_POST['newTag'])) {
            $newTag = htmlspecialchars($_POST['newTag']);
            $tagModel = new TagModel();
            $tagModel->create($newTag);

            header("Location: tag");
            exit();
        }

        header("Location: manage-tags?error=Invalid%20data");
        exit();
    }

    public function updateTag()
    {
        $tagId = $_GET['id'];
        $tagModel = new TagModel();
        $tag = $tagModel->getById($tagId);
        include '../../views/admin/tag/update.php';
    }

    public function submitUpdateTag()
    {
        $id = $_POST['id'];
        $label = $_POST['label'];
        $tag = new Tag($id, $label);
        $tagModel = new TagModel();
        $tagModel->update($tag);

        header('location:tag');
    }

    public function deleteTag()
    {
        $tagId = $_GET['id'];
        $tagModel = new TagModel();
        $tagModel->delete($tagId);

        header("Location: tag");
        exit();
    }
}
