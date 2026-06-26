<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../core/Router.php';


require_once __DIR__ . '/../app/Controllers/FleetController.php' ;




$router = new Router();
$router->resolve();
