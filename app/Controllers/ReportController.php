<?php
require_once 'BaseController.php';

class ReportController extends BaseController {
    public function index() {
        $db = $this->db();
        $mois = $_GET['mois'] ?? date('m');
        $annee = $_GET['annee'] ?? date('Y');

        // 1. Analyse financière sur la période sélectionnée
        $sqlStats = "SELECT type, SUM(montant) as total, COUNT(*) as nb 
                     FROM transactions 
                     WHERE MONTH(created_at) = ? AND YEAR(created_at) = ?
                     GROUP BY type";
        $stmtStats = $db->prepare($sqlStats);
        $stmtStats->execute([$mois, $annee]);
        $stats = $stmtStats->fetchAll(PDO::FETCH_ASSOC);
        
        // 2. Top 5 des véhicules les plus rentables (Global)
        $sqlTop = "SELECT v.marque, v.modele, SUM(t.montant) as gain 
                   FROM transactions t 
                   JOIN vehicules v ON t.vehicule_id = v.id 
                   GROUP BY v.id 
                   ORDER BY gain DESC LIMIT 5";
        $topVehicules = $db->query($sqlTop)->fetchAll(PDO::FETCH_ASSOC);

        $this->view('reports/index', [
            'stats' => $stats, 
            'topVehicules' => $topVehicules,
            'mois' => $mois,
            'annee' => $annee
        ]);
    }
}
