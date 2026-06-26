<?php
require_once 'BaseController.php';

class WorkshopController extends BaseController {
    public function index() {
        $entretiens = $this->db()->query("SELECT e.*, v.marque, v.modele FROM entretiens e JOIN vehicules v ON e.vehicule_id = v.id")->fetchAll();
        return $this->view('atelier/index', ['entretiens' => $entretiens]);
    }

    public function create() {
        $vehicules = $this->db()->query("SELECT id, marque, modele FROM vehicules")->fetchAll();
        return $this->view('atelier/create', ['vehicules' => $vehicules]);
    }

    public function store() {
        $sql = "INSERT INTO entretiens (vehicule_id, description, cout, date_entretien) VALUES (?, ?, ?, ?)";
        $this->db()->prepare($sql)->execute([$_POST['vehicule_id'], $_POST['description'], $_POST['cout'], $_POST['date']]);
        header('Location: ?url=workshop_index');
        exit;
    }
}
