<?php
require_once 'BaseController.php';

class SalesController extends BaseController {
    
    // Liste des véhicules disponibles pour réservation
    public function index() {
        $db = $this->db();
        $date_debut = $_GET['date_debut'] ?? null;
        $date_fin = $_GET['date_fin'] ?? null;
        $vehicules = [];

        if ($date_debut && $date_fin) {
            $sql = "SELECT * FROM vehicules
                    WHERE statut != 'Vendu'
                    AND id NOT IN (
                        SELECT vehicule_id FROM transactions
                        WHERE type = 'Location' AND (date_debut <= ? AND date_fin >= ?)
                    )";
            $stmt = $db->prepare($sql);
            $stmt->execute([$date_fin, $date_debut]);
            $vehicules = $stmt->fetchAll();
        }
        $this->view('sales/index', ['vehicules' => $vehicules, 'debut' => $date_debut, 'fin' => $date_fin]);
    }

    // Gestion des retours prévisibles
    public function retours_previsibles() {
        $db = $this->db();
        $start = $_GET['start'] ?? date('Y-m-d');
        $end = $_GET['end'] ?? date('Y-m-d', strtotime('+30 days'));

        $sql = "SELECT t.*, v.marque, v.modele, v.immatriculation 
                FROM transactions t 
                JOIN vehicules v ON t.vehicule_id = v.id 
                WHERE t.type = 'Location' AND t.date_fin BETWEEN ? AND ? 
                ORDER BY t.date_fin ASC";
        
        $stmt = $db->prepare($sql);
        $stmt->execute([$start, $end]);
        
        $this->view('sales/retours', [
            'retours' => $stmt->fetchAll(),
            'start' => $start,
            'end' => $end
        ]);
    }

    // Historique complet des transactions avec accès aux contrats
    public function historique() {
        $db = $this->db();
        $sql = "SELECT t.*, v.marque, v.modele, v.immatriculation 
                FROM transactions t
                JOIN vehicules v ON t.vehicule_id = v.id
                ORDER BY t.created_at DESC";
        $transactions = $db->query($sql)->fetchAll();
        $this->view('sales/historique', ['transactions' => $transactions]);
    }

    // Enregistrement d'une transaction avec upload de fichier
    public function sales_reserve() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = $this->db();
            $stmt = $db->prepare("SELECT id FROM vehicules WHERE immatriculation = ?");
            $stmt->execute([$_POST['immatriculation']]);
            $v = $stmt->fetch();

            $contratPath = null;
            if (isset($_FILES['contrat']) && $_FILES['contrat']['error'] == 0) {
                $uploadDir = 'uploads/contrats/';
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
                $fileName = uniqid() . '_' . basename($_FILES['contrat']['name']);
                if (move_uploaded_file($_FILES['contrat']['tmp_name'], $uploadDir . $fileName)) {
                    $contratPath = $uploadDir . $fileName;
                }
            }

            if ($v) {
                $sql = "INSERT INTO transactions (vehicule_id, type, date_debut, date_fin, montant, client_nom, client_email, contrat_path) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $db->prepare($sql)->execute([
                    $v['id'], 
                    $_POST['type'], 
                    !empty($_POST['date_debut']) ? $_POST['date_debut'] : null, 
                    !empty($_POST['date_fin']) ? $_POST['date_fin'] : null, 
                    $_POST['montant'], 
                    $_POST['client_nom'], 
                    $_POST['client_email'], 
                    $contratPath
                ]);

                $statut = ($_POST['type'] === 'Vente') ? 'Vendu' : 'Loué';
                $db->prepare("UPDATE vehicules SET statut = ? WHERE id = ?")->execute([$statut, $v['id']]);
            }
            header('Location: ?url=sales_index');
            exit;
        }

        $this->view('sales/formulaire_transaction', [
            'immat' => $_GET['immat'] ?? '', 
            'type_initial' => $_GET['type'] ?? 'Location'
        ]);
    }
}
