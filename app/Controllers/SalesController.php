<?php
require_once 'BaseController.php';

class SalesController extends BaseController {
    public function index() {
        $db = $this->db();
        $date_debut = $_GET['date_debut'] ?? null;
        $date_fin = $_GET['date_fin'] ?? null;
        $vehicules = [];

        if ($date_debut && $date_fin) {
            // Filtrage : On exclut les vendus et ceux déjà loués sur la période
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

    public function sales_reserve() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = $this->db();
            $stmt = $db->prepare("SELECT id FROM vehicules WHERE immatriculation = ?");
            $stmt->execute([$_POST['immatriculation']]);
            $v = $stmt->fetch();

            if ($v) {
                $sql = "INSERT INTO transactions (vehicule_id, type, date_debut, date_fin, montant, client_nom) VALUES (?, ?, ?, ?, ?, ?)";
                $db->prepare($sql)->execute([
                    $v['id'],
                    $_POST['type'],
                    !empty($_POST['date_debut']) ? $_POST['date_debut'] : null,
                    !empty($_POST['date_fin']) ? $_POST['date_fin'] : null,
                    $_POST['montant'],
                    $_POST['client_nom']
                ]);

                // Mise à jour automatique du statut
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
