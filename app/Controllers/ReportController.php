<?php
require_once 'BaseController.php';

class ReportController extends BaseController {
    public function index() {
        $db = $this->db();
        $mois = $_GET['mois'] ?? date('m');
        $annee = $_GET['annee'] ?? date('Y');
        
        $sql = "SELECT type, SUM(montant) as total, COUNT(*) as nombre 
                FROM transactions 
                WHERE MONTH(created_at) = ? AND YEAR(created_at) = ?
                GROUP BY type";
        $stmt = $db->prepare($sql);
        $stmt->execute([$mois, $annee]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $this->view('reports/index', ['stats' => $result, 'mois' => $mois, 'annee' => $annee]);
    }
}
