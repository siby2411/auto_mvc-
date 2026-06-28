<div class="art-bg"></div>
<style>
    :root { --glass: rgba(255, 255, 255, 0.07); --accent: #00d2ff; }
    body { background: #0f172a; color: #e2e8f0; font-family: 'Segoe UI', sans-serif; }
    .art-bg { position: fixed; top: -100px; right: -100px; width: 400px; height: 400px; background: linear-gradient(45deg, #1e3c72, var(--accent)); clip-path: polygon(20% 0%, 80% 0%, 100% 100%, 0% 80%); filter: blur(100px); z-index: -1; }
    .glass-card { background: var(--glass); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 20px; padding: 2rem; }
    .table { color: #fff !important; }
</style>

<div class="container-fluid mt-4">
    <div class="glass-card">
        <h3 class="text-accent mb-4">Annuaire Clients</h3>
        <a href="?url=clients_create" class="btn btn-info mb-3">+ Nouveau Client</a>
        <table class="table table-hover">
            <thead>
                <tr class="text-info"><th>ID</th><th>Nom</th><th>Email</th><th>Téléphone</th></tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $c): ?>
                <tr>
                    <td><?= $c['id'] ?></td>
                    <td><?= htmlspecialchars($c['nom'] ?? 'N/A') ?></td>
                    <td><?= htmlspecialchars($c['email'] ?? 'N/A') ?></td>
                    <td><?= htmlspecialchars($c['telephone'] ?? 'Non renseigné') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
