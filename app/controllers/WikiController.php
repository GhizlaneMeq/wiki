<?php

namespace App\controllers;

use App\entities\Wiki;
use App\models\CategoryModel;
use App\models\TagModel;
use App\models\UserModel;
use App\models\WikiModel;

class WikiController
{

    public function index()
    {
        try {
            if (isset($_SESSION["userId"])) {
                $userSId = $_SESSION["userId"];
                $user = new UserModel();
                $userData = $user->getUserById($userSId);
                $wikiModel = new WikiModel();
                $wikis = $wikiModel->getWikisByUser($_SESSION['userId']);
                include '../../views/auteur/displayWiki.php';
            } else {
                $userData = null;
            }

           
        } catch (\Exception $e) {
            header("Location: error-page?message=" . urlencode($e->getMessage()));
            exit();
        }
    }

    public function addWiki()
    {
        try {
            if ($_SESSION["isAuthor"]) {


                if (!isset($_SESSION['userId'], $_POST['title'], $_POST['content'], $_POST['category'], $_POST['tags'], $_FILES['image'])) {
                    throw new \Exception("All required fields are not set.");
                }

                $userSId = $_SESSION['userId'];
                $title = htmlspecialchars($_POST['title']);
                $content = $_POST['content'];
                $category = htmlspecialchars($_POST['category']);
                $tags = $_POST['tags'];

                $image = $_FILES['image']['name'];
                $temp_name = $_FILES['image']['tmp_name'];
                $folder = "public/img/" . $image;
                move_uploaded_file($temp_name, __DIR__ . '/../../' . $folder);

                $wikiModel = new WikiModel();
                $wiki = new Wiki(null, $title, $content, $folder, null, false, null, $userSId, $category);
                $wikiId = $wikiModel->create($wiki);

                foreach ($tags as $tagId) {
                    $wikiModel->addTag($wikiId, $tagId);
                }

                header("Location: my-wikis");
                exit();
            } else {
                header("location:login");
            }
        } catch (\Exception $e) {
            header("Location: add-wiki?error=" . urlencode($e->getMessage()));
            exit();
        }
    }

    public function updateWiki()
    {
        try {
            if (!isset($_SESSION["userId"])) {
                throw new \Exception("User not authenticated");
            }

            $userSId = $_SESSION["userId"];
            $user = new UserModel();
            $userData = $user->getUserById($userSId);

            if (!$userData) {
                throw new \Exception("User data not found");
            }
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                $id = isset($_GET['id']) ? $_GET['id'] : null;

                $wikiModel = new WikiModel();
                $wiki = $wikiModel->getById($id);

                if (!$wiki) {
                    throw new \Exception("Wiki not found");
                }

                $tagModel = new TagModel();
                $tags = $tagModel->getAll();

                $categoryModel = new CategoryModel();
                $categories = $categoryModel->getAll();
                $defaultCategoryId = $wiki->getCategoryId();
                $defaultTagIds = $wiki->getTags();
                include '../../views/auteur/updateWiki.php';
                exit();
            }
        } catch (\Exception $e) {
            header("Location: display-wiki&error=" . urlencode($e->getMessage()));
            exit();
        }
    }

    public function submitUpdateWiki()
    {
        try {

            $id = $_POST['id'];

            $title = htmlspecialchars($_POST['title']);
            $content = $_POST['content'];
            $category = htmlspecialchars($_POST['category']);
            $tag = htmlspecialchars($_POST['tag']);

            $wikiModel = new WikiModel();
            $existingWiki = $wikiModel->getById($id);

            if (!$existingWiki) {
                throw new \Exception("Wiki not found");
            }

            $newImage = $_FILES['image']['name'] ?? null;

            if (!empty($newImage)) {
                $temp_name = $_FILES['image']['tmp_name'];
                $folder = "public/img/" . $newImage;
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $fileExtension = strtolower(pathinfo($newImage, PATHINFO_EXTENSION));

                if (in_array($fileExtension, $allowedExtensions)) {
                    move_uploaded_file($temp_name, __DIR__ . '/../../' . $folder);
                } else {
                    throw new \Exception("Invalid file format. Allowed formats: " . implode(', ', $allowedExtensions));
                }
            } else {
                $folder = $existingWiki->getImage();
            }

            $updatedWiki = new Wiki($id, $title, $content, $folder, null, null, null, null, $category, $tag);

            $wikiModel->update($updatedWiki);

            header("Location: my-wikis");
            exit();
        } catch (\Exception $e) {
            header("Location: update-wiki?id=$id&error=" . urlencode($e->getMessage()));
            exit();
        }
    }

    public function deleteWiki()
    {
        try {
            $wikiId = isset($_GET['id']) ? (int) $_GET['id'] : null;

            if (!$wikiId) {
                throw new \Exception("Invalid wiki ID");
            }

            $wikiModel = new WikiModel();
            $wiki = $wikiModel->getById($wikiId);

            if (!$wiki) {
                throw new \Exception("Wiki not found");
            }

            $wikiModel->delete($wikiId);

            header("Location:my-wikis");
            exit();
        } catch (\Exception $e) {
            header("Location:display-wiki&error=" . urlencode($e->getMessage()));
            exit();
        }
    }


    public function seeMoreWiki()
    {
        try {
            if (!isset($_SESSION["userId"])) {
                header("location:login");
                exit();
            }

            $userSId = $_SESSION["userId"];
            $user = new UserModel();
            $userData = $user->getUserById($userSId);

            if (!$userData) {
                throw new \Exception("User data not found");
            }

            $userName = $userData->getName();
            $wikiId = isset($_GET['id']) ? (int) $_GET['id'] : null;

            if (!$wikiId) {
                throw new \Exception("Invalid wiki ID");
            }

            $wikiModel = new WikiModel();
            $wiki = $wikiModel->getById($wikiId);
            $userData = $user->getUserById($wiki->getUserId());

            if (!$wiki) {
                throw new \Exception("Wiki not found");
            }

            $wikis = $wikiModel->getWikisByUserName($wiki->getUserId());

            include '../../views/wikiDetails.php';
        } catch (\Exception $e) {
            header("Location:home&error=" . urlencode($e->getMessage()));
            exit();
        }
    }


    public function archiveWiki()
    {
        try {
            if (!isset($_POST['wiki_id'])) {
                throw new \Exception("Invalid request. Wiki ID not provided.");
            }

            $wikiId = $_POST['wiki_id'];
            $wikiModel = new WikiModel();
            $wiki = $wikiModel->getById($wikiId);

            if (!$wiki) {
                throw new \Exception("Wiki not found");
            }

            $wikiModel->archive($wikiId);

            header("Location: wikis");
            exit();
        } catch (\Exception $e) {
            header("Location: wikis?error=" . urlencode($e->getMessage()));
            exit();
        }
    }

    public function disarchiveWiki()
    {
        try {


            $wikiId = $_POST['wiki_id'];
            $wikiModel = new WikiModel();
            $wiki = $wikiModel->getById($wikiId);

            if (!$wiki) {
                throw new \Exception("Wiki not found");
            }

            $wikiModel->disarchive($wikiId);

            header("Location:wikis");
            exit();
        } catch (\Exception $e) {
            header("Location: wikis?error=" . urlencode($e->getMessage()));
            exit();
        }
    }

}
