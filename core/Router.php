<?php
require_once __DIR__ . '/../app/Controllers/FleetController.php';
require_once __DIR__ . '/../app/Controllers/ClientsController.php';
require_once __DIR__ . '/../app/Controllers/WorkshopController.php';
require_once __DIR__ . '/../app/Controllers/SalesController.php';

class Router {
    public function resolve() {
        $url = isset($_GET['url']) ? $_GET['url'] : 'dashboard';
        $routes = [
            'dashboard'         => ['FleetController', 'dashboard'],
            'vehicules_liste'   => ['FleetController', 'vehicules_liste'],
            'vehicules_create'  => ['FleetController', 'vehicules_create'],
            'vehicules_store'   => ['FleetController', 'vehicules_store'],
            'upload_marketing'  => ['FleetController', 'upload_marketing'],
            'clients_liste'     => ['ClientsController', 'clients_liste'],
            'workshop_index'    => ['WorkshopController', 'index'],
            'sales_index'       => ['SalesController', 'index']
        ];

        if (array_key_exists($url, $routes)) {
            $class = $routes[$url][0];
            $method = $routes[$url][1];
            (new $class())->$method();
        } else {
            echo "Erreur 404 : Page introuvable.";
        }
    }
}
