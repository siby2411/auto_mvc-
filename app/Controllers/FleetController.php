<?php
require_once 'BaseController.php';
require_once __DIR__ . '/../../core/ImageHelper.php';

class FleetController extends BaseController {

    public function dashboard() {
        $db = $this->db();
        $mode = $_GET['mode'] ?? 'admin';
        $this->view('parc/dashboard', [
            'total' => $db->query("SELECT COUNT(*) FROM vehicules")->fetchColumn(),
            'enMaintenance' => $db->query("SELECT COUNT(*) FROM vehicules WHERE statut = 'En maintenance'")->fetchColumn(),
            'benefice' => $db->query("SELECT SUM(montant) FROM transactions")->fetchColumn() ?: 0,
            'mode' => $mode
        ]);
    }

    public function vehicules_liste() {
        $db = $this->db();
        $vehicules = $db->query("SELECT * FROM vehicules")->fetchAll();
        // On récupère aussi les images pour chaque véhicule pour éviter l'appel DB dans la vue
        $this->view('parc/liste', ['vehicules' => $vehicules]);
    }

    public function vehicules_profil() {
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: ?url=vehicules_liste'); exit; }
        
        $db = $this->db();
        $stmt = $db->prepare("SELECT * FROM vehicules WHERE id = ?");
        $stmt->execute([$id]);
        $v = $stmt->fetch();
        
        if (!$v) { die("Véhicule introuvable."); }
        
        $imgs = $db->prepare("SELECT chemin FROM images WHERE vehicule_id = ?");
        $imgs->execute([$id]);
        
        $this->view('parc/profil', ['v' => $v, 'images' => $imgs->fetchAll()]);
    }

    public function vehicules_create() { $this->view('parc/create'); }

    public function vehicules_store() {
        $db = $this->db();
        try {
            $stmt = $db->prepare("INSERT INTO vehicules (immatriculation, marque, modele, statut) VALUES (?, ?, ?, 'Disponible')");
            $stmt->execute([$_POST['immatriculation'], $_POST['marque'], $_POST['modele']]);
            $vehicule_id = $db->lastInsertId();

            if ($vehicule_id > 0 && !empty($_FILES['galerie']['name'][0])) {
                foreach ($_FILES['galerie']['tmp_name'] as $key => $tmpName) {
                    if ($_FILES['galerie']['error'][$key] === UPLOAD_ERR_OK) {
                        $path = ImageHelper::upload(['name' => $_FILES['galerie']['name'][$key], 'tmp_name' => $tmpName]);
                        if ($path) {
                            $db->prepare("INSERT INTO images (vehicule_id, chemin) VALUES (?, ?)")->execute([$vehicule_id, $path]);
                        }
                    }
                }
            }
            header('Location: ?url=vehicules_liste');
        } catch (PDOException $e) { die("Erreur : " . $e->getMessage()); }
        exit;
    }

    public function upload_marketing() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
            $uploadDir = 'public/uploads/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
            $fileName = time() . '_' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $fileName);
            header('Location: ?url=dashboard&mode=admin');
        }
        exit;
    }
}
