<?php
class BaseController {
    protected function db() {
        return new PDO('mysql:host=localhost;dbname=erp_auto', 'root', '');
    }

    protected function view($view, $data = []) {
        extract($data);
        
        $basePath = "/root/auto_mvc/resources/views/";
        $viewPath = $basePath . $view . ".php";
        
        // CORRECTION ICI : Pointage vers le nouveau dossier 'layouts'
        $layoutPath = $basePath . "layouts/app.php";

        ob_start();
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            die("Erreur : Fichier vue introuvable à $viewPath");
        }
        $content = ob_get_clean();
        
        if (file_exists($layoutPath)) {
            require $layoutPath;
        } else {
            die("Erreur : Layout introuvable à $layoutPath");
        }
    }
}
