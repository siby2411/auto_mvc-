<?php
require_once 'BaseController.php';
require_once __DIR__ . '/../../core/ImageHelper.php';

class FleetController extends BaseController {
    
    public function dashboard() {
        $db = $this->db();
        $this->view('parc/dashboard', [
            'total' => $db->query("SELECT COUNT(*) FROM vehicules")->fetchColumn(),
            'enMaintenance' => $db->query("SELECT COUNT(*) FROM vehicules WHERE statut = 'En maintenance'")->fetchColumn(),
            'benefice' => $db->query("SELECT SUM(montant) FROM ventes")->fetchColumn() ?: 0
        ]);
    }

    public function vehicules_liste() {
        $vehicules = $this->db()->query("SELECT * FROM vehicules")->fetchAll();
        $this->view('parc/liste', ['vehicules' => $vehicules]);
    }

    public function vehicules_create() {
        $this->view('parc/create');
    }

    public function vehicules_store() {
        $db = $this->db();
        try {
            $sql = "INSERT INTO vehicules (immatriculation, marque, modele, statut) VALUES (?, ?, ?, 'Disponible')";
            $stmt = $db->prepare($sql);
            $stmt->execute([$_POST['immatriculation'], $_POST['marque'], $_POST['modele']]);
            
            $vehicule_id = $db->lastInsertId();

            if ($vehicule_id > 0 && !empty($_FILES['galerie']['name'][0])) {
                foreach ($_FILES['galerie']['tmp_name'] as $key => $tmpName) {
                    if ($_FILES['galerie']['error'][$key] === UPLOAD_ERR_OK) {
                        $path = ImageHelper::upload(['name' => $_FILES['galerie']['name'][$key], 'tmp_name' => $tmpName]);
                        if ($path) {
                            $db->prepare("INSERT INTO images (vehicule_id, chemin) VALUES (?, ?)")
                               ->execute([$vehicule_id, $path]);
                        }
                    }
                }
            }
            header('Location: ?url=vehicules_liste');
        } catch (PDOException $e) {
            die("Erreur base de données : " . $e->getMessage());
        }
        exit;
    }

    public function upload_marketing() {
        $db = $this->db();
        for ($i = 1; $i <= 4; $i++) {
            $fieldName = "angle_" . $i;
            if (!empty($_FILES[$fieldName]['name'])) {
                $path = ImageHelper::upload($_FILES[$fieldName]);
                if ($path) {
                    $db->prepare("INSERT INTO marketing_images (angle, chemin) VALUES (?, ?)")
                         ->execute([$i, $path]);
                }
            }
        }
        header('Location: ?url=dashboard');
        exit;
    }
}
