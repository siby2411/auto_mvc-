<div class="card shadow p-4">
    <h3 class="mb-4">📊 États Financiers (Ventes & Locations)</h3>
    
    <?php if (!empty($stats)): ?>
        <table class="table table-hover table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>Type de transaction</th>
                    <th>Volume (Nombre)</th>
                    <th>Montant Total (FCFA)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($stats as $s): ?>
                <tr>
                    <td><?= htmlspecialchars($s['type']) ?></td>
                    <td><?= $s['nombre'] ?></td>
                    <td><?= number_format($s['total'], 2, ',', ' ') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Aucune donnée financière disponible pour le moment.</div>
    <?php endif; ?>
    
    <a href="?url=dashboard" class="btn btn-secondary mt-3">Retour au Dashboard</a>
</div>
