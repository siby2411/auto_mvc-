<?php
require_once 'BaseController.php';

class SalesController extends BaseController {
    public function index() {
        $ventes = $this->db()->query("SELECT s.*, v.marque, v.modele, c.nom FROM ventes s 
                                      JOIN vehicules v ON s.vehicule_id = v.id 
                                      JOIN clients c ON s.client_id = c.id")->fetchAll();
        return $this->view('sales/index', ['ventes' => $ventes]);
    }

    public function create() {
        $vehicules = $this->db()->query("SELECT * FROM vehicules WHERE statut = 'Disponible'")->fetchAll();
        $clients = $this->db()->query("SELECT * FROM clients")->fetchAll();
        return $this->view('sales/create', ['vehicules' => $vehicules, 'clients' => $clients]);
    }

    public function store() {
        $sql = "INSERT INTO ventes (vehicule_id, client_id, type_transaction, montant, date_trans) VALUES (?, ?, ?, ?, ?)";
        $this->db()->prepare($sql)->execute([$_POST['vehicule_id'], $_POST['client_id'], $_POST['type'], $_POST['montant'], date('Y-m-d')]);
        // Mise à jour statut véhicule
        $this->db()->prepare("UPDATE vehicules SET statut = 'Vendu/Loué' WHERE id = ?")->execute([$_POST['vehicule_id']]);
        header('Location: ?url=sales_index');
        exit;
    }
}
