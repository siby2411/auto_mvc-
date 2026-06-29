<?php
require_once 'BaseController.php';

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
        $this->view('parc/profil', ['v' => $v]);
    }

    public function vehicules_create() { $this->view('parc/create'); }

    public function vehicules_store() {
        $db = $this->db();
        try {
            // 1. Préparation de la requête avec la nouvelle colonne photo_path
            $stmt = $db->prepare("INSERT INTO vehicules (immatriculation, marque, modele, statut, photo_path) VALUES (?, ?, ?, 'Disponible', ?)");
            
            $fileName = null;
            
            // 2. Traitement de l'upload de l'image
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'public/uploads/vehicules/';
                // Créer le dossier s'il n'existe pas
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
                
                $fileName = time() . '_' . basename($_FILES['photo']['name']);
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir . $fileName)) {
                    // Upload réussi
                } else {
                    $fileName = null; // Échec de l'upload
                }
            }

            // 3. Exécution avec les données du formulaire
            $stmt->execute([
                $_POST['immatriculation'], 
                $_POST['marque'], 
                $_POST['modele'], 
                $fileName
            ]);

            header('Location: ?url=vehicules_liste');
        } catch (PDOException $e) { 
            die("Erreur base de données : " . $e->getMessage()); 
        }
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
