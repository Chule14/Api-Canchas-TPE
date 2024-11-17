<?php
require_once "libs/router.php";
require_once "controller/ApicanchaController.php";
require_once "controller/ApiTurnoController.php";


$router = new Router();

                        #endpoint       verbo              controller                     metodoController
$router->addRoute('Canchas'           , 'GET', 'ApicanchaController', 'getAll');
$router->addRoute('Canchas/sortedByPrecio', 'GET', 'ApicanchaController', 'getCanchaSortedByPrecio');
$router->addRoute('Canchas/:id_cancha', 'GET', 'ApicanchaController', 'getCanchaByID');
$router->addRoute('Canchas'           , 'POST','ApicanchaController', 'createCancha');
$router->addRoute('Canchas/:id_cancha', 'PUT', 'ApicanchaController', 'update');

$router->addRoute('Turnos'                  , 'GET','ApiTurnoController',  'getAllTurnos');
$router->addRoute('Turnos/:id_turno'        , 'GET','ApiTurnoController', 'getTurnoByID');
$router->addRoute('Turnos/cancha/:id_cancha', 'GET','ApiTurnoController', 'getTurnoByCancha');
$router->addRoute('Turnos'           , 'POST','ApiTurnoController', 'createTurno');


$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
