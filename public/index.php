<?php

use app\controllers\HomeController;
use app\controllers\OrdersController;
use app\controllers\UsersController;
use app\core\Application;

require_once __DIR__.'/../vendor/autoload.php';
$app = new Application(dirname(__DIR__));

$app->router->get('/', [HomeController::class, 'renderView']);
$app->router->get('/users', [UsersController::class, 'renderView']);
$app->router->post('/users', [UsersController::class, 'postData']);
$app->router->get('/orders', [OrdersController::class, 'renderView']);
$app->router->post('/orders', [OrdersController::class, 'postData']);

$app->run();
