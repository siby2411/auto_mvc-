<div class="art-bg"></div>
<style>
    :root { --glass: rgba(255, 255, 255, 0.07); --accent: #00d2ff; }
    body { background: #0f172a; color: #e2e8f0; }
    .art-bg { position: fixed; top: -100px; right: -100px; width: 400px; height: 400px; background: linear-gradient(45deg, #1e3c72, var(--accent)); clip-path: polygon(20% 0%, 80% 0%, 100% 100%, 0% 80%); filter: blur(100px); z-index: -1; }
    .glass-card { background: var(--glass); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 20px; padding: 2rem; }
</style>

<div class="container-fluid mt-4">
    <div class="glass-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="text-accent">Historique des Transactions</h3>
            <a href="?url=sales_index" class="btn btn-outline-light">Retour</a>
        </div>

        <table class="table table-hover align-middle">
            <thead>
                <tr class="text-info"><th>Date</th><th>Client</th><th>Véhicule</th><th>Contrat</th></tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $t): ?>
                <tr>
                    <td><?= $t['created_at'] ?></td>
                    <td><?= htmlspecialchars($t['client_nom']) ?></td>
                    <td><?= htmlspecialchars($t['marque'].' '.$t['modele']) ?></td>
                    <td>
                        <?php if (!empty($t['contrat_path'])): ?>
                            <a href="<?= htmlspecialchars($t['contrat_path']) ?>" target="_blank" class="btn btn-sm btn-info">📄 Consulter</a>
                        <?php else: ?>
                            <span class="text-muted">---</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
