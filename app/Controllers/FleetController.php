<?php
require_once 'BaseController.php';
require_once __DIR__ . '/../../core/Database.php';

class FleetController extends BaseController {
    public function dashboard() {
        $db = $this->db();
        $this->view('parc/dashboard', [
            'total' => $db->query("SELECT COUNT(*) FROM vehicules")->fetchColumn(),
            'enMaintenance' => $db->query("SELECT COUNT(*) FROM vehicules WHERE statut = 'Maintenance'")->fetchColumn(),
            'benefice' => $db->query("SELECT SUM(montant) FROM ventes")->fetchColumn() ?: 0
        ]);
    }
    public function vehicules_liste() {
        $data = $this->db()->query("SELECT * FROM vehicules")->fetchAll();
        $this->view('parc/liste', ['vehicules' => $data]);
    }
    public function vehicules_create() {
        $this->view('parc/create');
    }
}
