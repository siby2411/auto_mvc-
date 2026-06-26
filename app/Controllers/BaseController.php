<?php
class BaseController {
    protected function db() { return Database::getConnection(); }

    protected function view($path, $data = []) {
        extract($data); // <--- C'est cette ligne qui transforme ['total' => 10] en variable $total
        $file = __DIR__ . '/../../resources/views/' . $path . '.php';
        $layout = __DIR__ . '/../../resources/views/layouts/app.php';
        
        if (file_exists($file)) {
            ob_start();
            include $file;
            $content = ob_get_clean();
            include $layout;
        }
    }
}
