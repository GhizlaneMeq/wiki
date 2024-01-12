<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../../vendor/autoload.php';

use App\routes\Router;





$router = new Router();

$router->setRoutes([
    'GET' => [

        '' => ['HomeController', 'index'],
        'home' => ['HomeController', 'index'],
        'dash' => ['AuthorDashController', 'dash'],
        'register' => ['AuthController', 'redirectToSignup'],
        'login' => ['AuthController', 'redirectToSignin'],
        'logout' => ['AuthController', 'logout'],
        'my-wikis' => ['WikiController', 'index'],
        'wikis' => ['AdminDashController', 'adminWikis'],
        'add-wiki' => ['AuthorDashController', 'addWiki'],
        'update-wiki' => ['WikiController', 'updateWiki'],
        'delete-wiki'=> ['WikiController', 'deleteWiki'],
        'see-details-wiki'=> ['WikiController', 'seeMoreWiki'],
        'admin-dashboard'=> ['AdminDashController', 'index'],
        'category'=> ['CategoryController', 'index'],
        'tag'=> ['TagController', 'index'],
        'delete-tag'=> ['TagController', 'deleteTag'],
        'delete-category'=> ['CategoryController', 'delete'],
        'update-category' => ['CategoryController', 'UpdateCategory'],
        'update-tag'=> ['TagController', 'updateTag'],
        'wiki-details'=> ['AdminDashController', 'wikiDetails'],
        'my-profile'=> ['AuthorDashController', 'updateProfile'],
        'Authors'=> ['AdminDashController', 'dispalyAuthors'],
        'search' => ['HomeController', 'search'],

        ],
    'POST' => [
        'submit-register' =>['AuthController','signup'],
        'submit-login' =>['AuthController','signin'],
        'add-wik' => ['WikiController', 'addWiki'],
        'submit-update-wiki' => ['WikiController', 'submitUpdateWiki'],
        'add-category'=> ['CategoryController', 'addCategory'],
        'submit-update-category'=> ['CategoryController', 'submitUpdateCategory'],
        'add-tag'=> ['TagController', 'addTag'],
        'submit-update-tag'=> ['TagController', 'submitUpdateTag'],
        'archive-wiki'=> ['WikiController', 'archiveWiki'],
        'disarchive-wiki'=> ['WikiController', 'disarchiveWiki'],
        'block-user'=> ['AdminDashController', 'BlockUser'],
        'submit-update-profile'=> ['AuthorDashController', 'submitUpdate'],
        'authorize-user'=> ['AdminDashController', 'AuthorizeUser'],

        

    ]
]);

if (isset($_GET['url'])) {
    $uri = trim($_GET['url'], '/');
    
    $methode = $_SERVER['REQUEST_METHOD'];

    try {
        $route = $router->getRoute($methode, $uri);

        if ($route) {
            list($controllerName, $methodName) = $route;

            $controllerClass = 'App\\controllers\\' . ucfirst($controllerName);

            $controller = new $controllerClass();

            if ($methodName) {
                if (method_exists($controller, $methodName)) {
                    $controller->$methodName();
                } else {
                    throw new Exception('Method not found in controller.');
                }
            } else {
                $controller->index();
            }
        } else {
            throw new Exception('Route not found.');
        }
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }

}
