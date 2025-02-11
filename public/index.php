<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\core\Router;
use App\controllers\frontOffice\EventController;
use App\controllers\Authentication\AuthController;
use App\controllers\frontOffice\HomeController;
use App\controllers\backsOffice\AdminController;
use App\controllers\backsOffice\CategoryController;

use App\core\Session;


use Twig\Environment;
use Twig\Loader\FilesystemLoader;



$router = new Router();
Session::checkSession();

$router->get('/', HomeController::class, 'index');
$router->get('/home', HomeController::class, 'index');

$router->get('/dashboard', AdminController::class, 'index');
$router->get('/dashboard/user/delete', AdminController::class, 'deleteUser');
$router->post('/dashboard/user/delete', AdminController::class, 'deleteUser'); // Add this route
$router->post('/dashboard/user/userStatus', AdminController::class, 'updateStatus');


$router->get('/dashboard/categories', CategoryController::class, 'index');
$router->post('/dashboard/categories/delete', CategoryController::class, 'deleteCategories');


$router->get('/dashboard/users', AdminController::class, 'updateStatus');
$router->post('/dashboard/user/userStatus', AdminController::class, 'updateStatus');



$router->post('/addEvent', EventController::class, 'createEvent');
$router->get('/addEvent', EventController::class, 'displayEventForm');
$router->get('/addEvent', EventController::class, 'afficheEvents');



$router->get('/register', AuthController::class, 'registerView');
$router->get('/login', AuthController::class, 'loginView');

$router->post('/register', AuthController::class, 'register');
$router->post('/login', AuthController::class, 'login');

$router->dispatch();
