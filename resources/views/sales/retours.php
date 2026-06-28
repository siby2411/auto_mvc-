<div class="container-fluid mt-4">
    <div class="d-flex gap-3 mb-4">
        <div class="trap-left d-flex align-items-center justify-content-center text-white fw-bold">PLANNING</div>
        <div class="trap-right d-flex align-items-center justify-content-center text-white fw-bold">SUIVI DES RETOURS (PÉRIODE DYNAMIQUE)</div>
    </div>

    <div class="card p-3 mb-4 shadow-sm border-0">
        <form action="?url=retours_previsibles" method="GET" class="row g-3 align-items-end">
            <input type="hidden" name="url" value="retours_previsibles">
            <div class="col-md-4">
                <label class="form-label">Date début</label>
                <input type="date" name="start" class="form-control" value="<?= htmlspecialchars($start ?? '') ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Date fin</label>
                <input type="date" name="end" class="form-control" value="<?= htmlspecialchars($end ?? '') ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-dark w-100">Filtrer</button>
            </div>
        </form>
    </div>

    <div class="card shadow-sm border-0">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Date Fin</th>
                    <th>Client</th>
                    <th>Véhicule</th>
                    <th>Immatriculation</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($retours)): ?>
                    <tr><td colspan="5" class="text-center">Aucun retour trouvé pour cette période.</td></tr>
                <?php else: foreach ($retours as $r): ?>
                <tr>
                    <td><span class="badge bg-secondary"><?= $r['date_fin'] ?></span></td>
                    <td><?= htmlspecialchars($r['client_nom']) ?></td>
                    <td><?= htmlspecialchars($r['marque'] . ' ' . $r['modele']) ?></td>
                    <td><span class="badge bg-dark"><?= htmlspecialchars($r['immatriculation']) ?></span></td>
                    <td>
                        <a href="https://wa.me/221776542803?text=Bonjour, rappel retour pour votre <?= urlencode($r['marque'] . ' ' . $r['modele']) ?> le <?= $r['date_fin'] ?>" 
                           target="_blank" class="btn btn-sm btn-success">💬 Rappel</a>
                    </td>
                </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
/* Animation d'apparition des lignes */
table tbody tr {
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Design trapèzes OMEGA */
.trap-left { width: 15%; height: 50px; background: #2c3e50; clip-path: polygon(0 0, 90% 0, 100% 100%, 0% 100%); }
.trap-right { width: 85%; height: 50px; background: #1e3c72; clip-path: polygon(0 0, 100% 0, 100% 100%, 2% 100%); }
</style>
