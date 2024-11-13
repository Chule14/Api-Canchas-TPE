<?php
require_once "libs/router.php";
require_once "controller/ApicanchaController.php";


$router = new Router();

                        #endpoint       verbo              controller                     metodoController
$router->addRoute('Canchas', 'GET', 'ApicanchaController', 'getAll');

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
