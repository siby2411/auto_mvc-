<?php
require_once 'BaseController.php';

class ReportController extends BaseController {
    public function index() {
        $db = $this->db();
        $sql = "SELECT type, SUM(montant) as total, COUNT(*) as nombre 
                FROM transactions 
                GROUP BY type";
        $result = $db->query($sql)->fetchAll();
        
        $this->view('reports/index', ['stats' => $result]);
    }
}
