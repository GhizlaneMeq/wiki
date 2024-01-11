<?php

namespace App\controllers;

use App\entities\Wiki;
use App\models\UserModel;
use App\models\WikiModel;

class WikiController
{

    public function index()
    {
        if (isset($_SESSION["userId"])) {
            $userSId = $_SESSION["userId"];
            $user = new UserModel();
            $userData = $user->getUserById($userSId);
        } else {
            $userData = null;
        }

        $wikiModel = new WikiModel();
        $wikis = $wikiModel->getWikisByUser($_SESSION['userId']);
        include '../../views/auteur/displayWiki.php';
    }

    public function addWiki()
    {



        $userSId = $_SESSION['userId'];
        if (isset($_POST['title'], $_POST['content'], $_POST['category'], $_POST['tags'], $_FILES['image'])) {

            $title = htmlspecialchars($_POST['title']);
            $content = $_POST['content'];
            $category = htmlspecialchars($_POST['category']);
            $tags = $_POST['tags'];

            $image = $_FILES['image']['name'];
            $temp_name = $_FILES['image']['tmp_name'];
            $folder = "public/img/" . $image;
            move_uploaded_file($temp_name, $folder);
            $wikiModel = new WikiModel();

            $wiki = new Wiki(null, $title, $content, $folder, null, false, null, $userSId, $category);
            $wikiId = $wikiModel->create($wiki);

            foreach ($tags as $tagId) {
                $wikiModel->addTag($wikiId, $tagId);
            }

            header("Location: my-wikis");
            exit();

        } else {
            $error = "All required fields are not set.";
        }

        header("Location: add-wiki?error=" . urlencode($error));
        exit();
    }

    public function updateWiki()
    {
        $wikiId = isset($_GET['id']) ? $_GET['id'] : null;

        if ($wikiId) {
            $wikiModel = new WikiModel();
            $wiki = $wikiModel->getById($wikiId);

            if ($wiki) {
                include '../../views/auteur/updateWiki.php';
                exit();
            } else {
                header("Location:display-wiki&error=Wiki not found");
                exit();
            }
        } else {
            header("Location:display-wiki&error=Invalid wiki ID");
            exit();
        }
    }

    public function submitUpdateWiki()
    {
        if (isset($_POST['id'], $_POST['title'], $_POST['content'], $_POST['category'], $_POST['tag'])) {
            $id = $_POST['id'];
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $category = htmlspecialchars($_POST['category']);
            $tag = htmlspecialchars($_POST['tag']);

            $wikiModel = new WikiModel();
            $existingWiki = $wikiModel->getById($id);

            if (!$existingWiki) {
                $error = "Invalid wiki ID";
                header("Location: update-wiki?id=$id&error=" . urlencode($error));
                exit();
            }

            $newImage = $_FILES['image']['name'] ?? null;

            if (!empty($newImage)) {
                $temp_name = $_FILES['image']['tmp_name'];
                $folder = "public/img/" . $newImage;
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $fileExtension = strtolower(pathinfo($newImage, PATHINFO_EXTENSION));

                if (in_array($fileExtension, $allowedExtensions)) {
                    move_uploaded_file($temp_name, $folder);
                } else {
                    $error = "Invalid file format. Allowed formats: " . implode(', ', $allowedExtensions);
                    header("Location: update-wiki?id=$id&error=" . urlencode($error));
                    exit();
                }
            } else {
                $folder = $existingWiki->getImage();
            }

            $updatedWiki = new Wiki($id, $title, $content, $folder, null, false, null, 1, 2);

            $wikiModel->update($updatedWiki);

            header("Location:display-wiki");
            exit();
        } else {
            $error = "All required fields are not set.";
            header("Location: update-wiki?&error=" . urlencode($error));
            exit();
        }
    }

    public function deleteWiki()
    {
        $wikiId = isset($_GET['id']) ? (int) $_GET['id'] : null;

        if ($wikiId) {
            $wikiModel = new WikiModel();
            $wikiModel->delete($wikiId);

            header("Location:my-wikis");
            exit();
        } else {
            header("Location:display-wiki&error=Invalid wiki ID");
            exit();
        }
    }

    public function seeMoreWiki()
    {
        if (isset($_SESSION["userId"])) {
            $userSId = $_SESSION["userId"];
            $user = new UserModel();
            $userData = $user->getUserById($userSId);
            $userName = $userData->getName();
        } else {
            $userData = null;
        }
        $wikiId = isset($_GET['id']) ? (int) $_GET['id'] : null;

        if ($wikiId) {
            $wikiModel = new WikiModel();
            $wiki = $wikiModel->getById($wikiId);

            $wikis = $wikiModel->getWikisByUserName($wiki->getUserId());

            if ($wiki) {
                include '../../views/wikiDetails.php';
            } else {
                header("Location:display-wiki&error=Wiki not found");
                exit();
            }
        } else {
            header("Location:display-wiki&error=Invalid wiki ID");
            exit();
        }
    }

    public function archiveWiki()
    {
        if (isset($_POST['wiki_id'])) {
            $wikiId = $_POST['wiki_id'];

            $wikiModel = new WikiModel();
            $wikiModel->archive($wikiId);

            header("Location: admin-dashboard");
            exit();
        }

        header("Location: dashboard?error=Invalid%20wiki%20ID");
        exit();
    }

    public function disarchiveWiki()
    {
        if (isset($_POST['wiki_id'])) {
            $wikiId = $_POST['wiki_id'];

            $wikiModel = new WikiModel();
            $wikiModel->disarchive($wikiId);

            header("Location: admin-dashboard");
            exit();
        }

        header("Location: dashboard?error=Invalid%20wiki%20ID");
        exit();
    }
}
