<?php
require_once __DIR__ . '/../app/Controllers/FleetController.php';
require_once __DIR__ . '/../app/Controllers/ClientsController.php';
require_once __DIR__ . '/../app/Controllers/WorkshopController.php';
require_once __DIR__ . '/../app/Controllers/SalesController.php';

class Router {
    public function resolve() {
        $url = $_GET['url'] ?? 'dashboard';
        $routes = [
            'dashboard'        => ['FleetController', 'dashboard'],
            'vehicules_liste'  => ['FleetController', 'vehicules_liste'],
            'vehicules_create' => ['FleetController', 'vehicules_create'],
            'clients_liste'    => ['ClientsController', 'clients_liste'],
            'workshop_index'   => ['WorkshopController', 'index'],
            'sales_index'      => ['SalesController', 'index']
        ];

        if (array_key_exists($url, $routes)) {
            $class = $routes[$url][0];
            $method = $routes[$url][1];
            $controller = new $class();
            $controller->$method();
        } else {
            echo "Page introuvable.";
        }
    }
}
