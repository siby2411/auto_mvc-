<?php
require_once __DIR__ . '/../app/Controllers/FleetController.php';
require_once __DIR__ . '/../app/Controllers/ClientsController.php';
require_once __DIR__ . '/../app/Controllers/WorkshopController.php';
require_once __DIR__ . '/../app/Controllers/SalesController.php';
require_once __DIR__ . '/../app/Controllers/ReportController.php';

class Router {
    public function resolve() {
        $url = isset($_GET['url']) ? $_GET['url'] : 'dashboard';

        $routes = [
            'dashboard'           => ['FleetController', 'dashboard'],
            'vehicules_liste'     => ['FleetController', 'vehicules_liste'],
            'vehicules_profil'    => ['FleetController', 'vehicules_profil'],
            'vehicules_create'    => ['FleetController', 'vehicules_create'],
            'vehicules_store'     => ['FleetController', 'vehicules_store'],
            'clients_liste'       => ['ClientsController', 'clients_liste'],
            'clients_create'      => ['ClientsController', 'clients_create'],
            'clients_store'       => ['ClientsController', 'clients_store'],
            'workshop_index'      => ['WorkshopController', 'index'],
            'sales_index'         => ['SalesController', 'index'],
            'sales_reserve'       => ['SalesController', 'sales_reserve'],
            'reports_index'       => ['ReportController', 'index'],
            'retours_previsibles' => ['SalesController', 'retours_previsibles']
        ];

        if (array_key_exists($url, $routes)) {
            $class = $routes[$url][0];
            $method = $routes[$url][1];
            (new $class())->$method();
        } else {
            http_response_code(404);
            echo "Erreur 404 : Page introuvable pour l'URL : " . htmlspecialchars($url);
        }
    }
}
