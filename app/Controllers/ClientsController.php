<?php
require_once 'BaseController.php';

class ClientsController extends BaseController {
    
    public function clients_liste() {
        $clients = $this->db()->query("SELECT * FROM clients")->fetchAll();
        return $this->view('clients/liste', ['clients' => $clients]);
    }

    public function clients_create() {
        return $this->view('clients/create');
    }

    public function clients_store() {
        $sql = "INSERT INTO clients (nom, contact, email) VALUES (?, ?, ?)";
        $this->db()->prepare($sql)->execute([
            $_POST['nom'], 
            $_POST['contact'], 
            $_POST['email']
        ]);
        header('Location: ?url=clients_liste');
        exit;
    }
}
